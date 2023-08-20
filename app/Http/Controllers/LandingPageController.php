<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index2()
    {
        return view('welcome-2');
    }

    public function index()
    {
        return view('welcome', [
            'products' => Product::with('category')->inRandomOrder()->take(8)->get()
        ]);
    }
}
