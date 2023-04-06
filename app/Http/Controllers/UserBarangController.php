<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserBarangController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $products = Product::where('name', 'like', "%" . $keyword . "%")
            ->orWhere('harga', 'like', "%" . $keyword . "%")
            ->orWhere('desc', 'like', "%" . $keyword . "%")
            ->paginate(9);


        if ((Auth::guard('user')->user())) {
            $userId = Auth::id();
            $user = User::with('carts')->find($userId);
            $carts = $user->carts;
        }
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        return view('user.index', compact('carousels', 'categories', 'products', 'carts',));
    }

    public function category($id, Request $request)
    {
        $userId = Auth::id();
        $user = User::with('carts')->find($userId);
        $carts = $user->carts;
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(6);
        return view('user.index', compact('products', 'categories', 'carousels', 'id', 'carts'));
    }
}
