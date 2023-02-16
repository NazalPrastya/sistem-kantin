<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserBarangController extends Controller
{
    public function index()
    {
        $barang = Product::all()->take(3);
        $products = Product::paginate(3);
        $carousels = Carousel::all()->take(5);
        $categories = Category::all();
        return view('user.index', compact('barang', 'carousels', 'categories', 'products'));
    }
}
