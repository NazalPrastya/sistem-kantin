<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function store(Request $request, History $history)
    {
        $carts = Cart::all();

        if ($carts->count() > 0) {

            $transaction = Transaction::create([
                'email' => $request->input('email'),
                'total' => $request->input('total')
            ]);

            foreach ($carts as $c) {
                $transaction->detail()->create([
                    'product_id' => $c->product_id,
                    'qty' => $c->qty,
                ]);
            }

            Cart::destroy($carts);
            Alert::success('Pembelian Berhasil', 'Silahkan bayar di kotak sebelah ya, ingat Allah maha melihat');
            return redirect('/keranjang');
        }

        return redirect('/keranjang')->with('error', 'Keranjang anda kosong masbro');
    }
}
