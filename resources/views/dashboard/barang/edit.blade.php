@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
    <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 ml-10 scale-125">
    <h2 class="font-bold text-2xl inline">Edit Data Barang </h2>
</div>
<div class="container pt-5">             
    <form method="post" action="/dashboard/barang/{{ $barang->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer rounded-sm @error('name')
            is_invalid
             @enderror" placeholder=" " value="{{ old('name', $barang->name ) }}" />
             @error('name')
             <div class="feedback">
                 {{ $message }}
             </div>
            @enderror
            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Product</label>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="harga" id="harga" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer rounded-sm @error('harga')
            is_invalid
             @enderror" placeholder=" " value="{{ old('harga', $barang->harga) }}"/>
             @error('harga')
             <div class="feedback">
                 {{ $message }}
             </div>
            @enderror
            <label for="harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga Barang</label>
        </div>
        <div class="relative z-0 w-full mb-6 group">                
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">Pilih Kategori</label>
            <select name="category_id" id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            @foreach ($category as $c)      
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
            </select>

        </div>

        <div class="relative z-0 w-full mb-6 group">                
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
            <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            <option value="enable">Tersedia</option>
            <option value="disable">Habis</option>
            </select>

        </div>

        <div class="relative z-0 w-full mb-6 group">                
                <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Barang</label>
                <textarea id="desc" name="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('desc')
                is_invalid
                 @enderror" placeholder="Masukan Deskripsi">{{ old('desc', $barang->desc) }}</textarea>
                 @error('desc')
                <div class="feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>

        <div class="relative z-0 w-full mb-6 group">  
            <div class="flex box-border">
                <input type="hidden" name="oldImage" value="{{ $barang->image }}">
                @if ($barang->image)
                <img src="{{ asset('storage/' . $barang->image) }}" width="100px" id="img-preview" class="img-preview bg-white mr-5 border-4 ring-2 ring-blue-400 border-[#0F4061] ">
                @else
                <img width="100px" id="img-preview" class="img-preview bg-white mr-5 border-4 ring-2 ring-blue-400 border-[#0F4061] ">  
                @endif
                           
                <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Gambar Barang</label>
                <input name="image" type="file" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-1 focus:border-sky-600 @error('image')
                is_invalid
                @enderror" id="file_input" type="file" value="{{ $barang->image }}" onchange="previewImage()" >
            </div>
        </div>
        </div>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>    
</div>

@endsection