<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\User;
use App\Models\History;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;
// use Symfony\Component\VarDumper\Cloner\Data;

class CartController extends Controller
{
    public function index()
    {
        $history = History::latest()->first();
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);
        $total = 100;
        ob_start();
        foreach ($user->carts as $c) {
            $total += ($c->product->harga * $c->qty) - 100;
        };
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' =>  $total,
            ),
            'customer_details' => array(
                'first_name' => Auth::getName(),
            ),
        );
        // @dd($history->id);
        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('user.cart.index', [
            'carts' => $user->carts,
            'product' => Product::with('products'),
            'snapToken' => $snapToken
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


    public function callback(Request $request)
    {
        // $userId = Auth::id();
        $carts = Cart::where('user_id', auth()->id())->get();
        if ($carts->count() > 0) {

            $serverKey = config('midtrans.server_key');
            $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
            if ($hashed == $request->signature_key) {
                if ($request->transaction_status == 'capture') {
                    // $transaction = Transaction::create([
                    //     'user_id' => $userId,
                    //     'total' => $request->gross_amount
                    // ]);

                    // foreach ($carts as $c) {
                    //     $transaction->detail()->create([
                    //         'product_id' => $c->product_id,
                    //         'qty' => $c->qty,
                    //     ]);
                    // }
                    // Cart::destroy($carts);
                    // Alert::success('Pembelian Berhasil', 'Terimakasih telah berbelanja di sini');
                    // return redirect('/keranjang');
                }
            }
        }
        return redirect('/keranjang')->with('error', 'Keranjang anda kosong masbro');
    }
}
