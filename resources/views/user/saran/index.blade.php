@extends('user.layout.template')
@section('content')

<div class="container pt-10 lg:flex lg:flex-row lg:gap-x-3">
    <form  method="post" action="/barang/saran" class="max-w-4xl justify-center mx-auto lg:w-1/2 ">
        <p class="text-lg font-bold lg:mt-5">Masukan Saran :</p>
        @csrf
        <div class="mb-6 lg:mt-5">
        <label for="sender" class="block mb-2 text-lg font-medium text-gray-900">Dari :</label>
        <input type="sender" id="sender" name="sender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 active:ring-blue-500 active:border-blue-500 block w-full p-2.5  @error('sender')
            is_invalid  
        @enderror" placeholder="Ucup Nur Jaman" required value="{{ old('sender') }}">
        @error('sender')
            <div class="feedback">
                {{ $message }}
            </div>
        @enderror
        </div>            
        <label for="saran" class="block mb-2 text-lg font-medium text-gray-900">Saran :</label>
        <textarea id="saran" rows="4" name="saran" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('saran')
            is_invalid
        @enderror" placeholder="Masukan saran yang membangun..." required value="{{ old('saran') }}"></textarea>
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
                    {{ $s->saran }}
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

</div> 

@include('user.layout.footer')
@endsection