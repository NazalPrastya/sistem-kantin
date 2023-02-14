<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserBarangController extends Controller
{
    public function index()
    {
        $barang = Product::all()->take(3);
        return view('user.index', compact('barang'));
    }
}
