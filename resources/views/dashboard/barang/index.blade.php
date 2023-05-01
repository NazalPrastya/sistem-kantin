@extends('layout.main')
@section('content')
    <div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
        {{-- <img src="/img/sidebar/ic'on/dashboard.svg" alt="" class="inline stroke mb-2 ml-10 scale-125"> --}}
        <h2 class="font-bold text-2xl inline ml-14"><i class="bx bx-store text-2xl text-blue-800"></i> Daftar Barang</h2>
    </div>

    @if (session()->has('success'))    
        <div id="alert-3" class="flex p-4 mb-4 mt-2 z-10 max-w-4xl mx-auto text-green-800 rounded-lg bg-green-50 " role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
              Success {{ session('success') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8  dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
        @endif
   
    <div class="container">
    {{-- Form Search --}}
    <div class="flex mt-3">
        <form action="{{ route('search') }}" class="flex items-center max-w-xs "> 
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" value="{{ old('search') }}">       
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <div class="mx-5 mt-2">
            <a href="/dashboard/barang" class="py-1 px-3 text-center text-[17px] rounded-md transition  hover:bg-[#D7DB01] {{ Request::is('dashboard/barang') ? 'btn-active' : 'bg-[#FBFF29]' }} ">Semua</a>
            @foreach ($category as $c )       
            <a href="/dashboard/barang/{{ $hash->encodeHex($c->id) }}" class="py-1 px-3 text-center text-[17px] rounded-md transition  hover:bg-[#D7DB01] {{ Request::is('dashboard/barang/'. $hash->encodeHex($c->id) ) ? 'btn-active' : 'bg-[#FBFF29]' }} ">{{ $c->name }}</a>
            @endforeach
        </div> 
    </div>
    {{-- End Form Search --}}
    <a href="/dashboard/create" class="p-1 px-3 inline-block text-lg  bg-sky-700 rounded-md text-white mt-5 mb-5 hover:bg-sky-800 hover:ring-1 hover:ring-yellow-300">Tambah Barang</a>

        <div class="flex flex-wrap gap-x-6 gap-y-6">      
            @foreach ($barang as $b)    
            <div class="w-full md:w-1/3 lg:w-1/5 shadow-lg px-3 pb-2 h-72 rounded-md group hover:bg-[#0D4C77] bg-[#177DC2] transition duration-150 relative">
               <img src="{{ asset('storage/'.$b->image) }}" alt="" class="mx-auto group-hover:scale-110 transition">

               
               <div class="flex justify-center space-x-2 pt-2">                    
            <!-- Modal toggle -->
            <div class="absolute bottom-2">
               <p class=" text-center -mt-2 text-xl font-extrabold tracking-wider text-white truncate">{{ $b->name }}</p>
               {{-- <p class=" text-center -mt-2 text-base font-light tracking-wider text-white truncate">{{ $b->desc }}</p> --}}
                
                    <a href="/dashboard/barang/edit/{{ $hash->encodeHex($b->id) }}"><i class="bx bx-edit text-3xl text-[#00D1FF] hover:text-[#0093B4]"></i></a>
                    
                    <button class="px-2 py-1 rounded-lg bg-[#FFAA29] text-white">Rp.{{ $b->harga }}</button>
                    
                    <form method="post" action="/dashboard/barang/{{ $b->id }}" class="inline">
                        @csrf @method('delete')
                        <button type="submit
                        " onclick="confirm('Mau hapus barang ini?')"><i class="bx bx-trash text-3xl text-red-600 hover:text-red-700"></i></button>
                    </form>
                    
            </div>        
                </a>
               </div>
            </div>
            @endforeach             
        </div>    
      
    </div>    
    <div class="p-5 pl-10">
        {{ $barang->links() }}
    </div>
@endsection