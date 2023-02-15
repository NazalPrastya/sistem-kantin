@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
    <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 ml-10 scale-125">
    <h2 class="font-bold text-2xl inline">Tambah Data Carousel</h2>
</div>
    <div class="container pt-5">             
        <form method="post" action="/dashboard/carousel" enctype="multipart/form-data">
            @csrf
            <div class="relative z-0 w-full mb-6 group">  
                <div class="flex box-border">
                    <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Gambar Carousel</label>
                    <input name="image" type="file" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-1 focus:border-sky-600 @error('image')
                    is_invalid
                    @enderror" id="file_input" type="file" value="{{ old('image') }}" onchange="previewImage()" >
                    <p class="mt-1 text-sm text-gray-500" id="file_input_help">SV, PNG, JPG(MAX. 800x400px).</p>
                    <img id="img-preview" class="img-preview mt-3 bg-white mr-5 border-2 ring-2 ring-blue-400 border-[#0F4061] w-full h-56">             
                </div>
            </div>
            </div>
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>    
    </div>



@endsection