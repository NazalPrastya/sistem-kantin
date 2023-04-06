@extends('user.layout.template')
@section('content')
    <div class="container pt-10">
        <h4 class="font-bold text-lg ml-6">Riwayat Belanja.....</h4>

        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Waktu Pembelian
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
            @php
            $total = 0;
            @endphp
            @foreach ($histories as $history)
                
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $history->created_at }}
                </td>
                <td class="px-6 py-4">
                    Rp. {{ number_format($history->total) }}
                </td>
                <td class="px-6 py-4">        
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
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 inline">Detail Riwayat</h3>
                                        <a href="{{ route("cetakDetail", $history->id) }}" class="inline ml-10 font-semibold p-1 px-4 bg-green-500 rounded-md text-white hover:bg-green-700">Cetak</a>
                                            <p>Tanggal : {{ date('d-m-Y', strtotime($history->created_at)) }}</p>
                                            <p>Nama : {{ $history->user->name }}</p>
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
                                                    {{-- @if ($history->transaction_id == $history->transaction_id) --}}
                                                    <tr class="p-5">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $h->product->name }}</td>
                                                        <td>{{ $h->product->harga }}</td>
                                                        <td>{{ $h->qty }}</td>
                                                        <td>Rp. {{number_format($h->qty * $h->product->harga) }}</td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                    
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            {{-- @php
                                            $total += ($history->history->product->harga * $history->history->qty);
                                            @endphp --}}
                                            <p class="mt-3 justify-end text-end font-bold text-sm text-black">Total Harga : Rp. {{ number_format($history->total) }}</p>
                                    </div>
                                    <div id="#footer" class="p-3 bg-slate-300 rounded-b-md">
                                        <p class="text-center text-sm text-black">Terimakasih telah berbelanja di kantin kami</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                </td>
                
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

    </div>
@endsection