@extends('user.layout.template')
@section('content')
<div class="container pt-10">        
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($carousels as $carousel)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $carousel->image) }}" class="w-full">
                </div>       
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <section id="category">
            <div class="flex flex-col md:flex-row pt-5 justify-center text-center">
                <div class="category ">
                    <a href="/barang" class=" md:px-5 hover:text-oren text-base md:text-lg {{ Request::is('barang') ? 'text-oren font-bold' : '' }}">Semua</a>
                    @foreach ($categories as $category)
                        <a href="/barang/{{ $category->id }}" class="md:px-3 hover:text-oren text-base md:text-lg {{ Request::is('barang/'. $category->id) ? 'text-oren font-bold' : '' }}">{{ $category->name }}</a>
                    @endforeach
                </div>
                
                <form action="{{ route('usearch') }}" method="get" class="flex items-center max-w-xs "> 
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('search') }}" placeholder="Search" autocomplete="off">
                    </div>
                    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
        </section>

        <section id="barang" class="pt-10">
            <div class="flex flex-wrap justify-center">       

                @foreach ($products as $product)
                <div class="w-full md:w-1/2 lg:w-1/4 shadow-lg ring-1 ring-slate-300 rounded-lg my-5 flex-col flex justify-between mx-3 relative">
                    @if ($product->status === 'disable')
                        
                    <span class="bg-red-700 text-center text-white text-xl py-5 absolute w-full top-36 left-0">Stock Habis!</span>
                    @endif

                    <div class="flex items-center justify-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-52">
                    </div>
                    <div class="mx-5 mt-2 bg-white bg-opacity-60 border-t-2 ">
                        <p class="text-2xl font-semibold">{{ $product->name }}</p>
                        <p class="font-light"> {{ $product->desc }}</p>
                        <span class="text-orange-500">{{ $product->category->name }}</span>
                      <div class="flex justify-between mb-3 items-center">
                        <span class="font-bold text-lg w-3/4">Rp. {{ $product->harga }}</span>
                        @if ($product->status === 'enable')     
                        <form action="{{ route('ustore') }}" method="post" class="ml-36 w-1/4">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="submit" class="p-2 px-3  font-semibold rounded-md bg-blue-600 text-white hover:bg-primary cursor-pointer duration-300 hover:ring-2 hover:ring-primary" value="Beli">
                        </form>
                        @endif
                      </div>
                    </div>
                  </div>
                @endforeach
                   
            </div>
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </section>
    </div>
</div>

@include('user.layout.footer')
@endsection

