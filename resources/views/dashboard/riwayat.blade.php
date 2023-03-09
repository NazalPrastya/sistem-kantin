@extends('layout.main')
@section('content')
    <div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
        <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 scale-125 ml-10">
        <h2 class="font-bold text-2xl inline ">Riwayat Pembelian</h2>
    </div>

    <div class="container pt-10">  
        <a href="{{ route('cetak-Riwayat', 1) }}" class="text-sm mx-2 py-1 px-3 bg-green-500 rounded-md text-slate-100 hover:bg-green-600 "> <i class='bx bxs-file-pdf'></i>1 Hari</a>
        <a href="{{ route('cetak-Riwayat', 3) }}" class="text-sm mx-2 py-1 px-3 bg-green-500 rounded-md text-slate-100 hover:bg-green-600 "> <i class='bx bxs-file-pdf'></i>3 Hari</a>      
        <a href="{{ route('cetak-Riwayat', 7) }}" class="text-sm mx-2 py-1 px-3 bg-green-500 rounded-md text-slate-100 hover:bg-green-600 "> <i class='bx bxs-file-pdf'></i>7 Hari</a>      
        <a href="{{ route('cetak-Riwayat', 30) }}" class="text-sm mx-2 py-1 px-3 bg-green-500 rounded-md text-slate-100 hover:bg-green-600 "> <i class='bx bxs-file-pdf'></i>30 Hari</a>      

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left ">
                <thead class="text-lg">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-bold">
                           Waktu Pembelian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email pembeli
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
                    @foreach ($histories as $history)
                        
                    <tr class="bg-white border-b rounded-lg mt-2">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap rounded-lg">
                           {{ $history->created_at->diffForHumans() }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $history->email }}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ number_format($history->total) }}
                        </td>
                        <td class="px-6 py-4  rounded-lg">
                            <!-- Modal toggle -->
                        <button data-modal-target="detail-riwayat-{{ $history->id }}" data-modal-toggle="detail-riwayat-{{ $history->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Detail
                        </button>
                        
                        <!-- Main modal -->
                        <div id="detail-riwayat-{{ $history->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="detail-riwayat-{{ $history->email }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 ">Detail Riwayat</h3>
                             
                                            <p>Tanggal :</p>
                                            <p>Email : {{ $history->email }}</p>
                                            <table width="100%" >
                                                <thead class="border-b-[1px] border-b-black pb-5">
                                                    <tr class="font-bold text-black">
                                                        <td >No</td>
                                                        <td>Barang</td>
                                                        <td>Harga</td>
                                                        <td>Jumlah</td>
                                                        <td>Subtotal</td>
                                                    </tr>
                                                </thead>
                                                <tbody class="pb-10 border-b-[1px] border-dashed border-black">
                                                    @foreach ($history->history as $h)

                                                    <tr class="p-5">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $h->product->name }}</td>
                                                        <td>{{ $h->product->harga }}</td>
                                                        <td>{{ $h->qty }}</td>
                                                        <td>Rp. {{number_format($h->qty * $h->product->harga) }}</td>
                                                    </tr>
        
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <p class="mt-3 justify-end text-end font-bold text-sm text-black">Total Harga : Rp. {{ number_format($history->total) }}</p>
                                    </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection