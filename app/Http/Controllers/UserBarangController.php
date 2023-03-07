<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Carousel;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserBarangController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::all();
        $keyword = $request->search;
        // $barang = Product::all()->take(3);
        $products = Product::where('name', 'like', "%" . $keyword . "%")->paginate(6);
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        return view('user.index', compact('carousels', 'categories', 'products', 'cart'));
    }

    public function category($id, Request $request)
    {
        $cart = Cart::all();
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(6);
        return view('user.index', compact('products', 'categories', 'carousels', 'id', 'cart'));
    }
}
