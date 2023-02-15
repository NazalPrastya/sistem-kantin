<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserBarangController extends Controller
{
    public function index()
    {
        $barang = Product::all()->take(3);
        $products = Product::all();
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        return view('user.index', compact('barang', 'carousels', 'categories', 'products'));
    }
}
