@extends('user.layout.template')
@section('content')
    <div class="container pt-10">
        <div class="flex flex-row bg-orange-600 justify-center rounded-lg">
            @foreach ($barang as $b)  
            <div class="w-full justify-center">
                <img src="{{ asset('/storage/'. $b->image) }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
@endsection