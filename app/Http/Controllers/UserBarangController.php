<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserBarangController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $barang = Product::all()->take(3);
        $products = Product::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        return view('user.index', compact('barang', 'carousels', 'categories', 'products'));
    }

    public function category($id, Request $request)
    {
        $keyword = $request->search;
        $products = Product::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        $barang = Product::where('category_id', $id)->paginate(6);
        return view('user.index', compact('barang', 'categories', 'carousels', 'products', 'id'));
    }
}
