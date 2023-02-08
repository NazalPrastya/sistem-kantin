@extends('layout.main')
@section('content')
    <div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061] pt-12">
        <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 scale-125 ml-10">
        <h2 class="font-bold text-2xl inline ">Riwayat Pembelian</h2>
    </div>

    <div class="container pt-10">        
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left ">
                <thead class="text-lg">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-bold">
                           Waktu Pembelian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b rounded-lg mt-2">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap rounded-lg">
                            18-1-2022 pukul 10.05
                        </th>
                        <td class="px-6 py-4">
                            6
                        </td>
                        <td class="px-6 py-4">
                            Rp. 16.000-
                        </td>
                        <td class="px-6 py-4  rounded-lg">
                            <button type="button" data-bs-toogle="modal" data-bs-target="#detail" class="px-2 py-1 bg-sky-700 text-white rounded-md font-medium hover:bg-sky-800">detail</button>
                        </td>
                    </tr>

                    <tr class="bg-white border-b rounded-lg mt-2">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap rounded-lg">
                            18-1-2022 pukul 10.05
                        </th>
                        <td class="px-6 py-4">
                            6
                        </td>
                        <td class="px-6 py-4">
                            Rp. 16.000-
                        </td>
                        <td class="px-6 py-4  rounded-lg">
                            <a href="" class="px-2 py-1 bg-sky-700 text-white rounded-md font-medium hover:bg-sky-800">detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection