@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
    <h2 class="font-bold text-2xl inline ml-14"><i class="bx bx-image-alt text-2xl"></i>Daftar Carousel</h2>
</div>

<div class="container pt-5">
    <a href="/dashboard/carousel/create" class="py-2 px-3 rounded-lg bg-blue-700 text-white hover:bg-blue-800">Tambah Carousel</a>

    <div class="flex flex-col pt-5">
        @foreach ($carousels as $carousel)   
        <div class="w-full border-1 ring-1 rounded-lg ">
            <img src="{{ asset('storage/' . $carousel->image ) }}" alt="" class="w-full h-56 lg:h-80 rounded-lg">
            <div class="py-2 px-2">
                <form action="/dashboard/carousel/{{ $carousel->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="py-1 px-3 rounded-lg bg-red-600 text-white hover:bg-red-500">Delete</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection