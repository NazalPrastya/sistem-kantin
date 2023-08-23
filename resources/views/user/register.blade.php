<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<title>Sistem Informasi Kantin| Register</title>
{{-- mystyle --}}
<link rel="preload" as="style" href="/build/assets/app-be74ee1a.css" />
<link rel="stylesheet" href="/build/assets/app-be74ee1a.css" />
<body>
    <!--  Application Details Start -->
    <div class="w-full bg-[#003146] ">
        <div class="container mx-auto py-8">
            <div class="w-96 mx-auto bg-white rounded shadow">

                <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-b border-grey-500">Registrasi
                </div>
                <a href="{{ route('goggle.redirect') }}" class="text-center flex justify-center gap-2 hover:text-yellow-400 text-sm items-center border border-white rounded-full py-2 hover:bg-slate-200 duration-300">
                    Sign Up With Google
                    <img src="/img/goggle.png" alt="google" width="30" class="inline" >
                </a>
                <form name="student_application" id="student_application" action="/register" method="post">
                    @csrf
                    <div class="py-4 px-8">
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Nama :</label>
                            <input class=" border border-gray-300 rounded w-full py-2 px-3 text-grey-darker @error('name')
                                is_invalid
                            @enderror" type="text"
                                name="name" id="name" value="{{ old('name') }}" placeholder="Masukan Nama Lengkap">
                            @error('name')
                                <div class="feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Email :</label>
                            <input class=" border border-gray-300 rounded w-full py-2 px-3 text-grey-darker @error('email')
                                is_invalid
                            @enderror" type="email"
                                name="email" id="email" value="{{ old('email') }}" placeholder="Enter Your Name">
                                @error('email')
                                    <div class="feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="flex justify-between">

                        <div class="mb-4">                          
                        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-8 text-center">
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        </select>
                        </div>

                        <div class="mb-4">
                             <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                            <select id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-14">
                            <option value="Pengembangan Perangkat Lunak dan Gim">PPLG</option>
                            <option value="Broadcasting">Broadcasting</option>
                            <option value="Animasi">Animasi</option>
                            <option value="Teknik Otomotif">TO</option>
                            <option value="Teknik Pengelasan dan Fekbrikasi Logam">TPFL</option>
                            </select>
                        </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">No Telp:</label>
                            <input class=" border border-gray-300 rounded w-full py-2 px-3 text-grey-darker @error('no_telp')
                                is_invalid
                            @enderror" type="text"
                                 id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="Masukan no telp">
                                @error('no_telp')
                                    <div class="feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                      
                        </div>

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Alamat :</label>                           
                                <textarea id="message" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('alamat')
                                    is_invalid
                                @enderror" placeholder="masukan alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Password :</label>
                            <input class=" border border-gray-300 rounded w-full py-2 px-3 text-grey-darker @error('password')
                                is_invalid
                            @enderror" type="password"
                                 id="password" name="password" value="{{ old('password') }}" placeholder="Masukan no telp">
                                @error('password')
                                    <div class="feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                      
                        </div>

                        <div class="mb-4 inline">
                            <button
                                class="mb-2 mx-16 rounded-full py-1 px-20 bg-gradient-to-r from-green-400 to-blue-500 ">
                                Save
                            </button>
                            <a href="/login" class="px-4 py-1 bg-green-400 rounded-md hover:bg-green-700 text-center">back</a>

                        </div>
                    </div>
                </form>
              
            </div>

        </div>
    </div>
    <!--  Application Details End -->


   
                    </div>
                </form>

            </div>

        </div>
    </div>
    <!-- Student Visa End -->



            {{-- my js --}}
            <link rel="modulepreload" href="/build/assets/app-d4180086.js" />
            <script type="module" src="/build/assets/app-d4180086.js"></script>
</body>

</html>