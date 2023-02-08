@extends('layout.main')
@section('content')
    <div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
        {{-- <img src="/img/sidebar/ic'on/dashboard.svg" alt="" class="inline stroke mb-2 ml-10 scale-125"> --}}
        <h2 class="font-bold text-2xl inline ml-14"><i class="bx bx-store text-2xl text-blue-800"></i> Daftar Barang</h2>
    </div>

   
    <div class="container pt-5">
    <a href="/dashboard/barang/create" class="p-1 px-3 inline-block text-lg  bg-sky-700 rounded-md text-white mt-5 mb-1 hover:bg-sky-800 hover:ring-1 hover:ring-yellow-300">Tambah Barang</a>
        <div class="flex flex-wrap gap-x-6 gap-y-6">      
            @foreach ($barang as $b)    
                
            <div class="w-full md:w-1/3 lg:w-1/5 shadow-lg px-3 pb-2 max-h-72 rounded-md group hover:bg-[#0D4C77] bg-[#177DC2] transition duration-150">
               <img src="{{ asset('storage/'.$b->image) }}" alt="" class="mx-auto group-hover:scale-110 transition">
               <p class="text-center -mt-2 text-2xl font-extrabold tracking-wider text-white">{{ $b->name }}</p>
               <div class="flex justify-center space-x-2 pt-2">
                {{-- <a href="#"> --}}
                    {{-- <i class="bi bi-eye-fill text-2xl font-extrabold text-slate-300 hover:text-slate-400"></i> --}}
                    
            <!-- Modal toggle -->
                    <button data-modal-target="modal-{{ $b->name }}" data-modal-toggle="modal-{{ $b->name }}" class="block text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center " type="button">
                        <i class="bi bi-eye-fill text-2xl font-extrabold text-slate-300 hover:text-slate-400"></i>
                    </button>
                
            <!-- Main modal -->
                    <div id="modal-{{ $b->name }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full ">
                        <div class="relative w-full max-w-md h-full md:h-auto ">
                            <!-- Modal content -->
                            <div class="relative bg-[#0F4061] rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal body -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-centerx" data-modal-hide="modal-{{ $b->name }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </div>
                                
                                <div class=" rounded-lg bg-[#0F4061]">
                                    <img src="{{ asset('storage/'.$b->image) }}" alt="" class="mx-auto scale-125 p-8">
                                    <div class="flex flex-col pb-3">
                                        <h4 class="leading-relaxed text-white text-center text-2xl font-bold">
                                            {{ $b->name }}
                                        </h4>
                                        <h5 class="text-lg text-center mx-auto text-white">{{ $b->category->name }}</h5>
                                        <p class="text-center text-white text-sm">{{ $b->desc }}</p>
                                        <div class="flex justify-center gap-x-2 pt-3">
                                            <a href="/dashboard/barang/edit/{{ $b->id }}"><i class="bx bx-edit text-3xl text-[#00D1FF] hover:text-[#0093B4]"></i></a>
                                            <form action="">
                                                <button class="px-2 py-1 rounded-lg bg-[#FFAA29] text-[#FBFF29]">Rp.{{ $b->harga }}</button>
                                            </form>
                                            <form method="post" action="/dashboard/barang/{{ $b->id }}">
                                                @csrf @method('delete')
                                                <button type="submit
                                                " onclick="confirm('Mau hapus barang ini?')"><i class="bx bx-trash text-3xl text-red-600 hover:text-red-700"></i></button>
                                            </form>
                                            <a href=""></a>
                                        </div>
                                    </div>
                                   
                                </div>
                            
                            </div>
                        </div>
                    </div>
                
                </a>
                <a href="#" class="p-1  font-semibold rounded-md bg-[#FFC700] text-white hover:bg-yellow-400">Rp.{{ $b->harga }}-</a>
                <a href="">
                    <i class="bi bi-cart-fill text-2xl font-extrabold text-yellow-300 hover:text-yellow-500"></i>
                </a>
               </div>
            </div>
            @endforeach             
        </div>    
    </div>    

@endsection