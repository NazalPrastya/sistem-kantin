@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061] ">
    <img src="/img/sidebar/icon/dashboard.svg" alt="" class="inline stroke mb-2 scale-125 ml-10">
    <h2 class="font-bold text-2xl inline ">Saran</h2>
</div>

        {{-- @if (session()->has('success'))    
        {{-- <div id="alert-3" class="flex p-4 mb-4 mt-2 z-10 max-w-4xl mx-auto text-green-800 rounded-lg bg-green-50 " role="alert"> --}}
            {{-- <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
              Success {{ session('success') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8  dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div> --}}
        {{-- @endif --}} 
        

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