@extends('user.layout.template')
@section('content')

@if (session('success'))
<div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 max-w-3xl mx-auto mt-10" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
      <span class="font-bold">Success</span>  {{ session('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
@endif

<div class="container pt-10 lg:flex lg:flex-row lg:gap-x-3">
    <form  method="post" action="/saran" class="max-w-4xl justify-center mx-auto lg:w-1/2 ">
        <p class="text-lg font-bold lg:mt-5">Masukan Saran :</p>
        @csrf
        <div class="mb-6 lg:mt-5">
        <label for="sender" class="block mb-2 text-lg font-medium text-gray-900">Dari :</label>
        <input type="sender" id="sender" name="sender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 active:ring-blue-500 active:border-blue-500 block w-full p-2.5  @error('sender')
            is_invalid  
        @enderror" placeholder="Ucup Nur Jaman" value="{{ old('sender') }}">
        @error('sender')
            <div class="feedback">
                {{ $message }}
            </div>
        @enderror
        </div>            
        <label for="saran" class="block mb-2 text-lg font-medium text-gray-900">Saran :</label>
        <textarea id="saran" rows="4" name="saran" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('saran')
            is_invalid
        @enderror" placeholder="Masukan saran yang membangun..." value="{{ old('saran') }}"></textarea>
        @error('saran')
            <div class="feedback">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="text-white  bg-blue-700 hover:bg-blue-800 mt-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
    </form>
  
  {{-- Start Table --}}
  <div class="overflow-x-auto sm:rounded-lg mx-auto items-center lg:w-1/2 lg:bg-slate-400 p-5">
    <p class="text-center text-lg font-bold mt-5 lg:mt-5">Daftar saran yang diberikan</p>
    <table class="w-full text-sm text-left text-gray-500 mt-5 lg:mt-8">
        <thead class="text-base text-gray-700 capitalize bg-gray-50 lg:bg-slate-300">
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
                @if ((Auth::guard('admin')->user()))
                <th scope="col" class="px-6 py-3">
                    Action
                </th>    
                @endif
                
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
                @if ((Auth::guard('admin')->user()))
                <td class="px-6 py-4">
                    <form action="/dashboard/saran/{{ $s->id }}" method="post" >
                        @csrf @method('delete')
                        <button type="submit"><i class="bi bi-trash text-base p-2 text-red-600 text-center hover:text-red-800  hover:rounded-full hover:bg-pink-200" onclick="confirm('hapus kan?')"></i></button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div> 

@include('user.layout.footer')
@endsection