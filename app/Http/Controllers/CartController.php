<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('dashboard.cart.index', [
            'carts' => Cart::all(),
            'products' => Product::with('product')
        ]);
    }

    public function store(Request $request)
    {
        $duplicate = Cart::where('product_id', $request->product_id)->first();
        if ($duplicate) {
            return redirect('dashboard/cart')->with('error', 'Barang sudah ada di keranjang');
        }
        Cart::create([
            'product_id' => $request->product_id,
            'qty' => 1
        ]);

        return redirect('dashboard/cart')->with('success', 'barang berhasil ditambakan ke keranjang');
    }
}
