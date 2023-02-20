
@extends('user.layout.template')
@section('content')
<div class="title w-full rounded-b-sm pt-10">
    <h2 class="font-semibold text-lg md:text-xl inline ml-14"></i>Keranjangku....</h2>
</div>
    
    <div class="container pt-5 space-y-2">
        <a href="/barang" class="p-1 px-2 text-lg md:text-xl text-white bg-blue-800 rounded-md hover:bg-blue-900 hover:ring-1 hover:ring-orange-600 ">Beli lagi</a>
        @foreach ($carts as $cart)
            
        {{-- <div class="w-full lg:h-24 rounded-md shadow-md bg-[#A8A8A8] lg:flex gap-2 text-center">
            <img src="{{ asset('storage/' . $cart->product->image) }}" alt="" class="border-r-2 px-" width="100">
            <div class="justify-center mx-auto text-center my-auto">
                <p class="text-2xl font-extrabold text-white">{{ $cart->product->name }}</p>
            </div>
            <label class="text-lg font-medium mx-auto my-auto">Rp.{{ $cart->product->harga }},00</label>
            <label class="text-lg font-medium mx-auto my-auto">{{ $cart->qty }}</label>
           <form action="" class="mx-auto my-auto">
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">+</button>
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">-</button>
            </form>

            <label class="text-lg font-medium mx-auto my-auto">Rp.2000-</label>
            <form action="/dashboard/cart/{{ $cart->id }}" method="post" class="mx-auto my-auto">
                @method('delete')
                @csrf
                <button type="submit" class="text-white text-lg font-bold rounded-xl px-2 bg-red-600 hover:bg-red-700 hover:ring-1 hover:ring-white">Cancel</button>
            </form>
        </div> --}}

        <div class="w-full bg-[#A8A8A8] h-auto rounded-md flex flex-row py-1">
            <img src="{{ asset('storage/' . $cart->product->image) }}" alt="" class="object-cover w-28 border-r-2 m-2">
            <div class="flex flex-col gap-y-1 md:flex-row md:mx-auto md:my-auto md:gap-x-5 lg:gap-x-10">
                <p class="text-lg font-bold lg:text-2xl">{{ $cart->product->name }}</p>
                <p class="lg:text-lg">Rp.{{ $cart->product->harga }}</p>
                <div class="flex flex-row">
                    <p class="inline lg:text-lg">Jumlah : {{ $cart->qty }}</p>
                    <form action="" class="inline ml-2">
                        <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white hover:bg-slate-600">+</button>
                        <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white hover:bg-slate-600">-</button>
                    </form>
                </div>
                <p class="lg:text-lg">Subtotal : <span class="font-bold">Rp.{{ $cart->qty * $cart->product->harga }}</span></p>
                <form action="/cart/{{ $cart->id }}" method="post" class="">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white text-base font-bold rounded-xl px-2 bg-red-600 hover:bg-red-700 hover:ring-1 hover:ring-white lg:text-lg">Cancel</button>
                </form>
            </div>
        </div>

        @endforeach

        {{-- Checkout Harga --}}
        <p class="text-end text-lg font-bold pr-3">Total: Rp.31.000-</p>

        <div class="m-auto flex justify-center">
            <form action="" class="mx-auto my-auto">
                <button type="submit" class="text-center px-2 py-1 rounded-lg font-extrabold tracking-wider  bg-sky-700 text-white">Checkout</button>
            </form>
        </div>
    </div>
@endsection

