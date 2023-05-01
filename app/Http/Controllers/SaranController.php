<?php

namespace App\Http\Controllers;

use App\Models\Saran;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;

class SaranController extends Controller
{
    public function index()
    {
        $sensor = ['bodoh', 'bego', 'tolol', 'kontol', 'bloon', 'memek', 'anjing', 'babi'];
        foreach ($sensor as $s) {
            $replace = str_repeat("*", strlen($s));
        };
        $saran = Saran::all();
        return view('dashboard.saran.index', [
            'saran' => $saran,
            'replace' => $replace,
            'sensor' => $sensor
        ]);
    }

    public function cetakSaran()
    {
        $saran = Saran::all();
        view()->share('saran', $saran);
        $pdf = Pdf::loadView('dashboard.saran.cetak-saran');
        return $pdf->download('saran.pdf');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender' => 'required|min:5|max:100',
            'saran' => 'required|min:10'
        ]);

        Saran::create($validated);
        return redirect('/dashboard/saran')->with('success', 'Terimakasih telah memberikan saran');
    }

    public function destroy($id)
    {
        Saran::destroy($id);
        return redirect('/dashboard/saran')->with('success', 'Saran berhasil dihapus');
    }
}
