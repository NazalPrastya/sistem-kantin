<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\History;
// use Barryvdh\DomPDF\PDF;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Symfony\Component\VarDumper\Cloner\Data;

class RiwayatController extends Controller
{
    public function index()
    {


        // $id = History::get('transaction_id');
        // $details = History::find($id);
        $details = Transaction::with('history', 'history.product')->get();
        return view('user.riwayat.index', [
            'cart' => Cart::all(),
            // 'histories' => Transaction::all(),
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details)
        ]);
    }


    public function indexAdmin()
    {
        $details = Transaction::with('history', 'history.product')->get();
        return view('dashboard.riwayat', [
            'cart' => Cart::all(),
            // 'histories' => Transaction::all(),
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details)
        ]);
    }

    public function cetakRiwayat($days)
    {
        // $history = Transaction::with('history', 'history.product')->get();
        // view()->share('history', $history);
        // $pdf = Pdf::loadView('dashboard.cetak-history');
        // return $pdf->download('history.pdf');

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
}
