<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $auth =  Auth::guard('admin')->user();
        return view('dashboard.admin.admin', [
            'admins' => Admin::where('id', '!=', $auth->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
                'username' => 'required|min:5',
                'email' => 'required|email:dns|unique:admins',
                'no_hp' =>  'required|min:10|max:14|unique:admins',
                'password' => 'required|min:5'
            ],
            [
                'username.required' => 'username harus diisi',
                'username.min' => 'minimal 5 huruf',
                'email.required' => 'email harus diisi',
                'email.email' => 'email harus valid',
                'email.unique' => 'email sudah digunakan',
                'no_hp.required' => 'no hp harus diisi',
                'no_hp.min' => 'nomor minimal 10',
                'no_hp.max' => 'nomor maximal 14',
                'password.required' => 'password harus diisi',
                'password.requierd' => 'password minimal 5 huruf'
            ]
        );
        $validasi['password'] = Hash::make($validasi['password']);

        Admin::create($validasi);
        return redirect('/dashboard/admin')->with('succes', 'admin berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect('/dashboard/admin');
    }
}
