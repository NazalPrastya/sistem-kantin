@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
    <h2 class="font-bold text-2xl inline ml-14"><i class="bx bx-user-plus text-2xl text-blue-800"></i> Tambah Admin</h2>
</div>


<div class="container mt-5">
    <form action="{{ route('tambah-Admin') }}" method="post">
        @csrf

        <div class="mb-6">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
            <input type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('username')
            is-invalid
            @enderror" placeholder="nazalgusti" name="username" value="{{ old('username') }}">
            @error('username')
                <div class="feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email')
            is-invalid
        @enderror" placeholder="admin@gmail.com" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-6">
            <label for="number_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Phone Number</label>
            <input type="text" id="number_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('no_hp')
                is-invalid
            @enderror" placeholder="0891283912" name="no_hp" value="{{ old('no_hp') }}">
            @error('no_hp')
                <div class="feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('password')
            is-invalid
        @enderror" name="password">
        @error('password')
            <div class="feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
@endsection