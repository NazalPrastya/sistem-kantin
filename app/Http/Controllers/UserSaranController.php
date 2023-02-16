<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserSaranController extends Controller
{
    public function index()
    {
        $saran = Saran::all();
        return view('user.saran.index', [
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
        return redirect('/barang/saran')->with('success', 'Terimakasih telah memberikan saran');
    }
}
