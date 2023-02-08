@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061] pt-12">
    <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 scale-125 ml-10">
    <h2 class="font-bold text-2xl inline ">Keranjang</h2>
</div>

    <div class="container pt-5 space-y-2">
        <div class="w-full h-24 rounded-md shadow-md bg-[#A8A8A8] flex gap-2">
            <img src="/img/landing/barang/biskuat.svg" alt="" class="border-r-2 px-" width="100">
            <div class="justify-center mx-auto text-center my-auto">
                <p class="text-2xl font-extrabold text-white">Biskuat</p>
            </div>
            <label class="text-lg font-medium mx-auto my-auto">Rp.500,00</label>
            <label class="text-lg font-medium mx-auto my-auto">4</label>
           <form action="" class="mx-auto my-auto">
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">+</button>
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">-</button>
            </form>

            <label class="text-lg font-medium mx-auto my-auto">Rp.2000-</label>
            <form action="" class="mx-auto my-auto">
                <button type="submit" class="text-white text-lg font-bold rounded-xl px-2 bg-red-600 hover:bg-red-700 hover:ring-1 hover:ring-white">Cancel</button>
            </form>
        </div>

        <div class="w-full h-24 rounded-md shadow-md bg-[#A8A8A8] flex gap-2">
            <img src="/img/landing/barang/popmie1.svg" alt="" class="border-r-2 px-" width="100">
            <div class="justify-center mx-auto text-center my-auto">
                <p class="text-2xl font-extrabold text-white">Biskuat</p>
            </div>
            <label class="text-lg font-medium mx-auto my-auto">Rp.500,00</label>
            <label class="text-lg font-medium mx-auto my-auto">4</label>
           <form action="" class="mx-auto my-auto">
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">+</button>
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">-</button>
            </form>

            <label class="text-lg font-medium mx-auto my-auto">Rp.2000-</label>
            <form action="" class="mx-auto my-auto">
                <button type="submit" class="text-white text-lg font-bold rounded-xl px-2 bg-red-600 hover:bg-red-700 hover:ring-1 hover:ring-white">Cancel</button>
            </form>
        </div>

        <div class="w-full h-24 rounded-md shadow-md bg-[#A8A8A8] flex gap-2">
            <img src="/img/landing/barang/pucuk.svg" alt="" class="border-r-2 px-" width="100">
            <div class="justify-center mx-auto text-center my-auto">
                <p class="text-2xl font-extrabold text-white">Biskuat</p>
            </div>
            <label class="text-lg font-medium mx-auto my-auto">Rp.500,00</label>
            <label class="text-lg font-medium mx-auto my-auto">4</label>
           <form action="" class="mx-auto my-auto">
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">+</button>
                <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white font-bold hover:bg-slate-600">-</button>
            </form>

            <label class="text-lg font-medium mx-auto my-auto">Rp.2000-</label>
            <form action="" class="mx-auto my-auto">
                <button type="submit" class="text-white text-lg font-bold rounded-xl px-2 bg-red-600 hover:bg-red-700 hover:ring-1 hover:ring-white">Cancel</button>
            </form>
        </div>


        {{-- Checkout Harga --}}
        <p class="text-end text-lg font-bold pr-3">Total: Rp.31.000-</p>

        <div class="m-auto flex justify-center">
            <form action="" class="mx-auto my-auto">
                <button type="submit" class="text-center px-2 py-1 rounded-lg font-extrabold tracking-wider  bg-sky-700 text-white">Checkout</button>
            </form>
        </div>
    </div>
@endsection