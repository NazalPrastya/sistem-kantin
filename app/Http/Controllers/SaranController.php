<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SaranController extends Controller
{
    public function index()
    {
        $saran = Saran::all();
        return view('dashboard.saran.index', [
            'saran' => $saran
        ]);
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