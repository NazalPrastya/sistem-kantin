@extends('layout.main')
@section('content')
    <div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
        <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 scale-125 ml-10">
        <h2 class="font-bold text-2xl inline ">Dashboard</h2>
    </div>
    <div class="container pt-5">
        <h3 class="text-lg font-medium">Selamat datang Kembali {{ Auth::guard('admin')->user()->username }} di</h3>
        <h4 class="text-xl font-bold">Sistem Informasi Koperasi SMKN 1 Ciomas</h4>

        <div class="flex flex-wrap gap-x-5 space-y-2 pt-3">
            <div class="w-full lg:w-1/4 bg-[#FF8A00] rounded-lg  mt-2 shadow-md">
                <h5 class="text-center text-2xl font-bold text-white bg-[#6B6B6B]  rounded-t-lg p-2">Makanan Minuman</h5>
                <img src="/img/dashboard/biskuit.svg" alt="" class="mx-auto scale-125 ">
                <div class="mx-auto justify-center flex">
                    <a href="/dashboard/barang" class=" m-auto bg-[#2B7D69] font-bold  py-1 px-3 text-lg text-white rounded-md hover:bg-[#02FCBF]  hover:text-[#21735F]">Detail</a>
                    </div>
            </div>

            <div class="w-full lg:w-1/4 bg-[#FF8A00] rounded-lg  mt-2 shadow-md">
                <h5 class="text-center text-2xl font-bold text-white bg-[#6B6B6B] rounded-t-lg p-2">Aksesoris Seragam</h5>
                <img src="/img/dashboard/seragam.svg" alt="" class="mx-auto ">
                <div class="mx-auto justify-center flex">
                <a href="/dashboard/barang/3" class=" m-auto bg-[#2B7D69] font-bold  py-1 px-3 text-lg text-white rounded-md hover:bg-[#02FCBF]  hover:text-[#21735F]">Detail</a>
                </div>
            </div>

            <div class="w-full lg:w-1/4 bg-[#FF8A00] rounded-lg  mt-2 shadow-md pb-3">
                <h5 class="text-center text-2xl font-bold text-white bg-[#6B6B6B] rounded-t-lg p-2">Riwayat Pembelian</h5>
                <img src="/img/dashboard/riwayat.svg" alt="" class="mx-auto scale-125">
                <div class="mx-auto justify-center flex">
                <a href="/dashboard/riwayat" class=" m-auto bg-[#2B7D69] font-bold  py-1 px-3 text-lg text-white rounded-md hover:bg-[#02FCBF]  hover:text-[#21735F]">Detail</a>
                </div>
            </div>
    </div>
      
</div>


{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}


@endsection