@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061] ">
    <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 scale-125 ml-10">
    <h2 class="font-bold text-2xl inline ">Saran</h2>
</div>       

    <div class="container pt-3">     
        <a href="{{ route('cetak-saran') }}" class="text-lg px-3 py-2 rounded-md bg-green-500 text-white hover:bg-green-700"><i class='bx bxs-file-pdf'></i>Cetak Saran</a>

            <div class="overflow-x-auto sm:rounded-lg mx-auto items-center">
                <table class="w-full text-sm text-left text-gray-500 mt-5">
                    <thead class="text-base text-gray-700 capitalize bg-gray-50   ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pengirim
                            </th>
                            <th scope="col" class="px-6 py-3">
                                waktu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                pesan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saran as $s)   
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $s->sender }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $s->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                {{ str_replace($sensor, $replace, $s->saran) }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="/dashboard/saran/{{ $s->id }}" method="post" >
                                    @csrf @method('delete')
                                    <button type="submit"><i class="bi bi-trash text-base p-2 text-red-600 text-center hover:text-red-800  hover:rounded-full hover:bg-pink-200" onclick="confirm('hapus kan?')"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        {{-- </div> --}}


    </div>
@endsection