@extends('user.layout.template')
@section('content')
        <div class="container pt-20 max-w-md">
            <p class="text-3xl font-semibold mb-5">Ganti Password</p>
            @if (session()->has('message'))                   
            <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                  {{ session('message') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
              </div>  
            @endif
            
            <form action="{{ route('updatePassword') }}" method="post"  class="max-w-xl">
                @method('put')
                @csrf
                <div class="mb-6">
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Password Lama</label>
                <input type="password" id="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('current_password')
                    is_invalid
                @enderror" placeholder="password lama" name="current_password">
                @error('current_password')
                    <div class="feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-6 relative">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('password')
                    is_invalid
                @enderror" placeholder="password baru" name="password">
                <span id="showToggle" onclick="toggle()"><i class="bx bx-show text-3xl text-primary hover:text-darkblue focus:text-darkblue absolute top-[1.2rem] bottom-0 right-3 cursor-pointer"></i></span>
                @error('password')
                    <div class="feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
        
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                    <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('password_confirmation')
                        is_invalid
                    @enderror" placeholder="konfirmasi password" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
            
        </div>
        
        <script>
            function toggle() {
            var password = document.getElementById("password");
            var togglePassword = document.getElementById("showToggle");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
          </script>
@endsection