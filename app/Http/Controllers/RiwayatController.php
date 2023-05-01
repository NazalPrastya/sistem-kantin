<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class RiwayatController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);
        $details = Transaction::where('user_id', auth()->id())->get();
        return view('user.riwayat.index', [
            'carts' => $user->carts,
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details),

        ]);
    }


    public function indexAdmin()
    {
        $transaction = Transaction::select(
            DB::raw("SUM(total) as total"),
            DB::raw("MONTHNAME(created_at) as month_name")
        )->whereMonth('created_at', '<=', Carbon::now()->subMonth(12))->groupBy(DB::raw("month_name"))->orderBy('id', 'DESC')->pluck('total', 'month_name');
        $labels = $transaction->keys();
        $data = $transaction->values();


        $transactionTotal = Transaction::select(
            DB::raw("SUM(total) as total"),
            DB::raw("MONTHNAME(created_at) as month_name")
        )->groupBy(DB::raw("month_name"))
            ->orderBy('id', 'DESC')
            ->get();

        $total = $transactionTotal->sum('total');

        $details = Transaction::with('history', 'history.product')->paginate(10);
        return view('dashboard.riwayat', [
            'cart' => Cart::all(),
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details),
            'labels' => $labels,
            'data' => $data,
            'total' => $total
        ]);
    }

    public function cetakRiwayat(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $data = Transaction::whereBetween('created_at', [$start_date, $end_date])->with('history', 'history.product')->get();

        $pdf = PDF::loadView('dashboard.cetak-history', compact('data', 'start_date', 'end_date'));

        return $pdf->download('data dari' . $start_date . 'sampai' . $end_date . '.pdf');
    }

    public function cetakDetail($id)
    {
        $data = Transaction::findOrFail($id);
        // $data = Transaction
        $pdf = PDF::loadView('dashboard.cetak-detail', compact('data'));
        return $pdf->download('data riwayat ' . $data->email . '.pdf');
    }
    public function destroy($id)
    {
        $details = Transaction::find($id);
        $details->history()->delete();
        $details->delete();
        return redirect('/dashboard/riwayat')->with('success', 'Riwayat berhasil dihapus');
    }
}
