<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class LoginController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return view('login.index', compact('admin'));
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function goggleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Cek apakah pengguna sudah terdaftar berdasarkan alamat email
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::guard('user')->login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'kelas' => 'unknown',
                    'jurusan' => 'unknown',
                    'no_telp' => 'unknown',
                    'alamat' => 'unknown',
                    'image' => $user->getAvatar(),
                    'password' => bcrypt('social'), // Generate a random password
                ]);

                Auth::guard('user')->login($newUser);
            }

            return redirect()->intended('/barang'); // Ganti 'home' dengan rute yang sesuai
        } catch (Exception $e) {
            return redirect('/login'); // Ganti '/' dengan rute yang sesuai untuk penanganan kesalahan
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email:dns',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi'
            ]
        );

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } elseif (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/barang');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::guard('admin', 'user')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
