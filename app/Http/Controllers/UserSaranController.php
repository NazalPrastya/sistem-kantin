<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSaranController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);

        $saran = Saran::all();
        $sensor = ['bodoh', 'bego', 'tolol', 'kontol', 'bloon'];
        foreach ($sensor as $s) {
            $replace = str_repeat("*", strlen($s));
        };
        return view('user.saran.index', [
            'saran' => $saran,
            'carts' => $user->carts,
            'sensor' => $sensor,
            'replace' => $replace
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender' => 'required|min:5|max:100',
            'saran' => 'required|min:10'
        ], [
            'sender.required' => 'Wajib isi pengirim',
            'sender.min' => 'Minimal 5 huruf masbro',
            'sender.max' => 'Maximal 100 huruf massseh',
            'saran' => 'Wajib diisi sarannya yah',
            'saran.min' => 'Minimal 10 huruf'

        ]);

        Saran::create($validated);
        return redirect('/saran')->with('success', 'Terimakasih telah memberikan saran');
    }
}
