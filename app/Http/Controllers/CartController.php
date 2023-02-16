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
        return view('user.cart.index', [
            'carts' => Cart::all(),
            'product' => Product::with('products')
        ]);
    }

    public function store(Request $request)
    {
        $duplicate = Cart::where('product_id', $request->product_id)->first();
        if ($duplicate) {
            return redirect('barang/keranjang')->with('error', 'Barang sudah ada di keranjang');
        }
        Cart::create([
            'product_id' => $request->product_id,
            'qty' => 1
        ]);

        return redirect('barang/keranjang')->with('success', 'barang berhasil ditambakan ke keranjang');
    }


    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect('/barang/keranjang')->with('success', 'barang berhasil dicancel');
    }
}
