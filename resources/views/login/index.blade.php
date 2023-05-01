<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Informasi Kantin | Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            
        </style>
          @vite('resources/css/app.css')
    </head>
    <body class="bg-[#003146] bg-no-repeat">
        <div class="w-full h-full absolute z bg-bottom -bottom-20 bg-[url('/public/img/login/wave.svg')] bg-no-repeat  z-10 bg-cover">
        <section class="pt-20" >
            <div class="container text-white">
                <div class="w-full md:w-6/12 lg:w-5/12 mx-auto">
                    <h2 class="text-3xl font-[1000] bold text-center text-lime-600 tracking-wider stroke-white stroke-2 store" style="-webkit-text-stroke: 0.1rem white">SIKANTIN</h2>
                    <h3 class="text-2xl font-semibold text-center mt-3 ">Sign In</h3>
                    <p class="text-center font-medium mt-3">Welcome Back, are you admin?, Sign in as admin and manage your website brother!</p>
                    <form action="/login" method="post" class="mt-3 justify-center">
                        {{-- Alert Start --}}
                        @if (session()->has('loginError'))
                            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-medium">Failed </span>{{ session('loginError') }}

                                </div>
                            </div>
                        @endif

                        @if (session()->has('success'))
                        <div class="flex p-4 mb-4 text-sm text-green-600 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                            <span class="font-medium">Success </span>{{ session('success') }}

                            </div>
                        </div>
                        @endif
                        {{-- Alert End --}}
                        @csrf
                        <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>

                        <input  name="email" id="email" class="bg-[#46829B] text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 placeholder:text-center placeholder:text-white placeholder:italic placeholder:text-md @error('email')
                            is-invalid
                        @enderror" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <div class="feedback text-pink-600 text-base">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium ">Your password</label>

                        <input type="password" name="password" id="password" class="bg-[#46829B] font-thin   text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 placeholder:italic placeholder:text-white placeholder:text-center placeholder:font-thin @error('password')
                            is-invalid
                        @enderror" placeholder="Password" >
                        @error('password')
                        <div class="feedback text-pink-600 text-base">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                        <div class="flex items-start mb-6">
   
                        </div>
                        <button type="submit" class="text-white text-lg font-extrabold bg-[#5FBD50] hover:bg-[#379B26] focus:ring-1 focus:outline-none focus:ring-green-400  rounded-lg  w-full px-5 py-2.5 text-center ">Login</button>
                    </form>
                    <p>Ga punya akun?. <a href="/register" class="underline hover:text-slate-300">registrasi disini</a> </p>
                    <a href="/" class="italic underline text-slate-0 font-light text-end inline-block py-1 px-3 rounded-md mt-1 text-md bg-green-500 hover:bg-green-800">back</a>
                </div>  
            </div>
        </section>
         @vite('resources/js/app.js')
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
          </script>
    </body>
</html>