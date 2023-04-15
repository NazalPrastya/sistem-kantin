<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

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

    public function gantiImage(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image' => 'required|max:2048|image'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage != 'profile/default.png') {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile');
        }
        Alert::success('success', 'Gambar berhasil diubah');
        User::where('id', auth()->id())->update($validatedData);
        return redirect('/profile');
    }

    public function gantiPassword()
    {
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);
        $carts = $user->carts;
        return view('user.change-password', compact('carts'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            Alert::success('Berhasil', 'Berhasil ganti password');
            return back();
        }
        throw ValidationException::withMessages([
            'current_password' => 'Password tidak cocok'
        ]);
    }
}
