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
}
