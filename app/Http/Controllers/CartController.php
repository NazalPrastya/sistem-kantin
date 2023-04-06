<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
// use Symfony\Component\VarDumper\Cloner\Data;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);
        return view('user.cart.index', [
            'carts' => $user->carts,
            'product' => Product::with('products'),
            // 'cart' => Cart::all()
        ]);
    }

    public function store(Request $request)
    {
        $duplicate = Cart::where('product_id', $request->product_id)->where('user_id', auth()->id())->first();
        if ($duplicate) {
            return redirect('/keranjang')->with('error', 'Barang sudah ada di keranjang');
        }
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'qty' => 1
        ]);
        Alert::success('Success', 'Barang berhasil masuk keranjang');
        return redirect('/keranjang');
    }


    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect('/keranjang')->with('success', 'barang berhasil dicancel');
    }


    public function tambahQty(Request $request, $id)
    {
        $no = 1;
        $cart = Cart::find($id);
        $cart->product_id = $request->input('product_id');
        $cart->qty = $request->input('qty');
        $cart->update();
        return redirect('/keranjang')->with('success', 'Jumlah berhasil ditambahkan');
        // dd($nilai);
    }

    public function kurangQty(Request $request, $id)
    {
        $cart = Cart::find($id);

        if ($cart->qty > 1) {
            $cart->product_id = $request->input('product_id');
            $cart->qty = $request->input('qty');
            $cart->update();
            return redirect('/keranjang')->with('success', 'Jumlah berhasil dikurangi');
        } else {
            return redirect('/keranjang')->with('error', 'jumlah minimal 1');
        }

        // dd($nilai);
    }
}
