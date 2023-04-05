<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class RiwayatController extends Controller
{
    public function index()
    {
        // $labels = ['Januari', 'Februari', 'Maret', 'April', 'May', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $details = Transaction::with('history', 'history.product')->get();
        return view('user.riwayat.index', [
            'cart' => Cart::all(),
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details),
            // 'label' => $labels
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

        $details = Transaction::with('history', 'history.product')->get();
        return view('dashboard.riwayat', [
            'cart' => Cart::all(),
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details),
            'labels' => $labels,
            'data' => $data,
            'total' => $total
        ]);
        // @dd($labels);
    }

    public function cetakRiwayat($days)
    {
        // Menghitung tanggal awal dan akhir berdasarkan rentang hari
        $today = Carbon::now()->toDateString();
        $start_date = Carbon::now()->subDays($days)->toDateString();

        // Query data dari database berdasarkan tanggal awal dan akhir
        $data = Transaction::whereBetween('created_at', [$start_date, $today])->with('history', 'history.product')->get();

        // Generate PDF dengan DOMPDF
        $pdf = PDF::loadView('dashboard.cetak-history', compact('data', 'start_date', 'today'));

        // Download file PDF
        return $pdf->download('data-' . $days . '-hari-' . $today . '.pdf');
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
