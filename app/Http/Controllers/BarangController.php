<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $keyword = $request->search;

        $query = $request->input('search');

        $results = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('harga', 'LIKE', "%$query%")
            ->get();


        return view('dashboard.barang.index', [
            'barang' => $results->paginate(6),
            'category' => Category::all()
        ]);
    }


    public function category($id)
    {
        $category = Category::all();
        $barang = Product::where('category_id', $id)->paginate(6);
        return view('dashboard.barang.index', compact('barang', 'category', 'id'));
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
            'harga' => 'required|integer|min:3',
            'category_id' => 'required',
            'desc' => 'required|min:10',
            'image' => 'required|file|max:1024'
        ], [
            'name.required' => 'product harus diisi',
            'name.min' => 'minimal 5 huruf',
            'name.max' => 'maximal 100 huruf',
            'harga.required' => 'harga harus diisi',
            'harga.integer' => 'harga harus berisi angka tanpa' .  '.' . ',' .  'atau Rp',
            'harga.min' => 'minimal harga 100 perak',
            'desc.required' => 'dekripsi harus diisi',
            'image.required' => 'image harus diisi'
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

    public function edit(Product $product)
    {
        return view('dashboard.barang.edit', [
            'barang' => $product,
            'category' => Category::all()
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'harga' => 'required|integer|min:5',
            'category_id' => 'required',
            'desc' => 'required|min:5',
            'image' => 'file|max:1024'
        ], [
            'name.required' => 'Product harus diisi'
        ]);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('barang-image');
        }

        $product->update($validatedData);
        return redirect('dashboard/barang')->with('success', 'barang berhasil diedit');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);
        return redirect('/dashboard/barang')->with('success', 'Barang berhasil dihapus');
    }
}
