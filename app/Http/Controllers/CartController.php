<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\VarDumper\Cloner\Data;

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
            return redirect('/keranjang')->with('error', 'Barang sudah ada di keranjang');
        }
        Cart::create([
            'product_id' => $request->product_id,
            'qty' => 1
        ]);

        return redirect('/keranjang')->with('success', 'barang berhasil ditambakan ke keranjang');
    }


    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect('/keranjang')->with('success', 'barang berhasil dicancel');
    }


    public function addQty(Request $request)
    {
        // $nilai = $request->input('nilai');
        // $data = Data::find($request->input('qty'));
        // $data->nilai += $nilai;
        // $data->save();
        // return redirect()->back();

        // $nilai = $request->qty;
        // $data
    }
}
