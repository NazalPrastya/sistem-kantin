<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/img/logo.png" class="scale-150">

        <title>Sistem Informasi Kantin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                /* background-image: url('img/landing/background.png');
                background-repeat: no-repeat;
                background-size: cover;
                object-fit: center; */

            }
            
        </style>
        @vite('resources/css/app.css')
        
        {{-- mystyle
        <link rel="preload" as="style" href="/build/assets/app-91987c3c.css" />
        <link rel="stylesheet" href="/build/assets/app-91987c3c.css" /> --}}
    </head>
    <body>
        {{-- Start Navbar --}}
        <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 bg-op">
            <div class="container">
              <div class="flex items-center justify-between relative">
                <div class="px-4">
                  <a href="#home" class="font-[1000] text-3xl text-black block py-6 tracking-tight" style="-webkit-text-stroke: 0.1rem #FBFF29">SIKANTIN</a>
                </div>
                <div class="flex items-center px-4">
                  <nav id="nav-menu" class=" py-5   max-w-[200px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="">
                      <li class="group">
                        <a href="/login" class="text-lg font-extrabold text-dark mx-8 flex group-hover:bg-yellow-400 w-auto bg-yellow-300 px-5 py-1 rounded-lg border-2 border-oren ">Login</a>
                      </li>                   
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </header>
        {{-- End Navbar --}}

        {{-- start hero section --}}
          <section id="home" class="min-h-screen relative bg-gradient-to-t from-white to-yellow-100">
            <img src="/img/landing/choco.svg" alt="choco" class="absolute bottom-20 left-0 scale-75 animate-wiggle  ">
            <img src="/img/landing/snack.svg" alt="choco" class="absolute top-16 right-5 scale-75 animate-wiggle z-20">
            <img src="/img/landing/bercak.png" class="absolute top-0 left-0 animate-pulse" >

            <div class="container pt-28 pb-10">
               <div class="flex  flex-col-reverse lg:flex-row relative z-30">
                
                <div class="w-full lg:w-1/2 mb-16 text-center lg:text-start relative" data-aos="fade-up" data-aos-duration="2000" >
                  <img src="/img/landing/chips.svg" alt="choco" class="absolute hidden lg:block lg:bottom-16 lg:right-5 scale-75 animate-wiggle md:z-10">
                    <h1 class="font-semibold text-2xl md:text-[3rem] md:leading-[3rem]">Selamat datang <span class="font-extrabold ">Di 
                        Kantin SMK Negeri 1 Ciomas</span></h1>
                      <p class="font-medium text-lg mt-3 text-slate-900 md:w-[28rem]">ayo habiskan uang kalian untuk berbelanja di kantin kita tercinta... <span class="text-red-700">❤</span><span class="text-green-600">💸</span></p>
                     <a href="/barang" class="flex justify-between bg-primary w-fit px-5 py-2 mt-5 rounded-l-xl rounded-tr-xl items-center font-semibold text-lg ring-1 ring-oren hover:bg-oren hover:ring-primary hover:rounded-br-xl hover:rounded-tr-none duration-300 hover:shadow-xl hover:shadow-white"><span>Ayo Belanja</span> <i class='bx bx-right-arrow-alt ml-5 text-2xl'></i></a>
                </div>
                <div class="w-full lg:w-1/2 flex justify-center" data-aos="fade-up" data-aos-duration="2500">
                  <img src="/img/landing/character.png" alt="character" width="90%">
                </div>
               </div>
            </div>
          </section>
        {{-- End Hero Section --}}

        {{-- Start Barang--}}
          <section id="barang" class="pt-36 relative">
            <img src="/img/landing/dot.png" class="absolute top-0 -left-10">
            <img src="/img/landing/rosemary.png" class="absolute bottom-0 right-0">
            <div class="container">
              <h2 class="text-center font-bold text-3xl ">Menu Kami</h2>
              <div class="flex flex-wrap justify-center mt-10">
                @foreach ($products as $product)
                <div class="w-full md:w-1/2 lg:w-1/4 shadow-lg ring-1 ring-slate-300 rounded-lg my-5 flex-col flex justify-between mx-3 relative" data-aos="fade-up" data-aos-duration="2000">
                  <span class="bg-primary w-fit absolute top-5 left-0 pr-5 rounded-r-lg">{{ $product->category->name }}</span>
                  <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-52">
                  </div>
                  <div class="mx-5 mt-2 bg-white bg-opacity-60 border-t-2 ">
                    <p class="text-xl md:text-2xl font-semibold">{{ $product->name }}</p>
                    <p class="font-light text-sm md:text-base"> {{ $product->desc }}</p>
                    <div class="flex justify-between mb-3 items-center">
                      <span class="font-bold text-base md:text-lg w-3/4">Rp. {{ $product->harga }}</span>
                      <form action="{{ route('ustore') }}" method="post" class="ml-36 w-1/4">
                        @csrf
                         <input type="hidden" value="{{ $product->id }}" name="product_id">
                         <input type="submit" class="p-2 px-3  font-semibold rounded-md bg-primary text-white hover:bg-yellow-500 cursor-pointer duration-300 hover:ring-2 hover:ring-primary" value="Beli">
                        </form>
                    </div>
                  </div>
                </div>

                @endforeach
              </div>
              <div class="flex items-center justify-center mt-6" data-aos="fade-up" data-aos-duration="2000">
                <a href="/barang" class="bg-orange-500 text-white font-semibold text-center px-6 py-3 rounded-full hover:bg-primary hover:ring-1 hover:ring-orange-500 duration-200 transition-all ease-in-out">Lihat Barang Lainnya...</a>
              </div>
            </div>
          </section>
        {{-- End Barang --}}


        {{-- Start Panduan --}}
          <section id="panduan" class="py-36">
            <div class="container">
              <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 h-[14rem] mx-3 my-3"  data-aos="fade-up" data-aos-duration="2000">
                  <iframe class="w-full h-full" src="https://www.youtube.com/embed/g1490nuZnVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="w-full md:w-1/3 mx-3 my-3" data-aos="fade-up" data-aos-duration="2500">
                  <h3 class="font-bold text-3xl">Panduan Penggunaan</h3>
                  <article  >
                    <p>Ingin tahu bagaimana cara menggunakan sistem kantin kami dengan lancar? Kami telah merilis video panduan singkat yang akan membimbing Anda melalui langkah-langkah mudah dalam memanfaatkan sistem ini secara efektif.</p>
                  </article>
                </div>
              </div>
            </div>
          </section>
        {{-- End Panduan --}}

        {{-- Start Footer --}}
        @include('user.layout.footer')
        {{-- End Footer --}}

         <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                });
            </script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
              AOS.init();
            </script>
            @vite('resources/js/app.js')
    </body>
</html>
