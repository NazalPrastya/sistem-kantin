<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // $history = History::all();
        // $histories = $history->detail->get();
        $id = History::get('transaction_id');
        $details = History::find($id);

        return view('user.riwayat.index', [
            'cart' => Cart::all(),
            // 'histories' => Transaction::all(),
            'histories' => $details,
            'detail' => History::where('transaction_id' == $details)
        ]);
    }
}
