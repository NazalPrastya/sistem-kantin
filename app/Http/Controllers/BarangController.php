<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Controller;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.barang.index', [
            'barang' => Product::all(),
            'category' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang.create', [
            'barang' => Product::all(),
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'harga' => 'required|integer|min:5',
            'category_id' => 'required',
            'desc' => 'required|min:10',
            'image' => 'required|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('barang-image');
        }

        Product::create($validatedData);

        return redirect('dashboard/barang')->with('success', 'barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.barang.edit', [
            'barang' => $product,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'harga' => 'required|integer|min:5',
            'category_id' => 'required',
            'desc' => 'required|min:10',
            'image' => 'required|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('barang-image');
        }

        $product->upadate($validatedData);
        return redirect('dashboard/barang')->with('success', 'barang berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/dashboard/barang')->with('success', 'Barang berhasil dihapus');
    }
}
