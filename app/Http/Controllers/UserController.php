<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);
        $carts = $user->carts;
        return view('user.profile', compact('carts'));
    }

    public function create()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email:dns|unique:users',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_telp' => 'required|min:10|max:14',
            'alamat' => 'required',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi berhasil');
    }
}
