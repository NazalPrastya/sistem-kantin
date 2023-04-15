@extends('user.layout.template')
@section('content')
<section class="pt-20">
    <div class="container">
        <p class="text-2xl font-semibold text-center pb-5">Detail Akun</p>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3 p-0">
                <div class="form w-full">
                    <form action="{{ route('gantiImg') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="oldImage" value="{{ Auth::guard('user')->user()->image }}">
                        @if (Auth::guard('user')->user()->image)
                        <img src="{{ asset('storage/' . Auth::guard('user')->user()->image) }}" width="250px" id="img-preview" class="img-preview bg-white mr-5 border-4 ring-2 ring-blue-400 border-[#0F4061] rounded-full">
                        @else
                        <img width="250px" id="img-preview" class="img-preview bg-white mr-5 border-4 ring-2 ring-blue-400 border-[#0F4061] rounded-full">  
                        @endif
                                
                        <div class="w-full">
                        <input name="image" type="file" id="image" class="block w-30 mt-3 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-1 focus:border-sky-600 mb-3 @error('image')
                        is_invalid
                        @enderror" id="file_input" type="file" value="{{ Auth::guard('user')->user()->image }}" onchange="previewImage()" >

                        @error('image')
                            <div class="feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit" class="px-4 py-1 bg-blue-700 rounded-md hover:bg-blue-900 text-white text-base">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 text-lg font-semibold pl-0">
            <p> Nama : {{ Auth::guard('user')->user()->name }}</p>
            <p> Email :  {{ Auth::guard('user')->user()->email }}</p>
            <p> Kelas :  {{ Auth::guard('user')->user()->kelas }}</p>
            <p> Jurusan :  {{ Auth::guard('user')->user()->jurusan }}</p>
            <p> No Telepon :  {{ Auth::guard('user')->user()->no_telp }}</p>
            <p class="mb-5"> Alamat :  {{ Auth::guard('user')->user()->alamat }}</p>
            <a href="/change-password" class="px-4 py-1 bg-teal-700 rounded-md hover:bg-teal-900 text-white text-base">Ganti Password</a>
        </div>
    </div>
</section>

@endsection