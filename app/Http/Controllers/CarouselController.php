<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

    public function index()
    {
        return view('dashboard.carousel.index', [
            'carousels' => Carousel::all()
        ]);
    }


    public function create()
    {
        return view('dashboard.carousel.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('carousel');
        }

        Carousel::create($validatedData);

        return redirect('dashboard/carousel')->with('success', 'carousel berhasil ditambahkan');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
