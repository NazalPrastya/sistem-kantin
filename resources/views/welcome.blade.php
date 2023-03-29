<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/img/logo.png" class="scale-150">

        <title>Sistem Informasi Kantin Jujur</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

          @vite('resources/css/app.css')
    </head>
    <body>
      <div id="loader"></div>
        {{-- Start Navbar --}}
        <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
            <div class="container">
              <div class="flex items-center justify-between relative">
                <div class="px-4">
                  <a href="#home" class="font-[1000] text-3xl text-black block py-6 tracking-tight" style="-webkit-text-stroke: 0.1rem #FBFF29">SIKANTIN</a>
                </div>
                <div class="flex items-center px-4">
                  <button id="hamburger" name="hamburger" class="block absoulute right-4 lg:hidden" type="button">
                    <span class="hamburger-line bg-black transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                  </button>
      
                  <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[200px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="block lg:flex">
                      <li class="group">
                        <a href="#home" class="text-lg text-dark py-2 mx-8 flex group-hover:font-bold hover:text-primary active:font-bold active:text-black ">Beranda</a>
                      </li>
                      <li class="group">
                        <a href="#barang" class="text-lg text-dark py-2 mx-8 flex group-hover:font-bold hover:text-primary active:font-bold active:text-black">Barang</a>
                      </li>
                      <li class="group">
                        <a href="#footer" class="text-lg text-dark py-2 mx-8 flex group-hover:font-bold hover:text-primary active:font-bold active:text-black ">Tentang Saya</a>
                      </li>

                      <li class="group">
                        <a href="/login/admin" class="text-lg font-extrabold text-dark mx-8 flex group-hover:bg-yellow-400 w-auto bg-yellow-300 px-5 py-1 rounded-lg border-2 border-oren ">Admin</a>
                      </li>
                      
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </header>
        {{-- End Navbar --}}

        {{-- Start Hero Section --}}
        <section id="home" class="pt-10">
            <div class="container">
                <div class="flex flex-wrap ">
                    <div class="w-full self-center pt-10 px-5 lg:w-1/2 " data-aos="fade-right" data-aos-duration="2000">
                        <p class="font-semibold text-4xl ">Hi Guys, Selamat datang <span class="font-extrabold ">Di 
                          Kantin Jujur SMK Negeri 1 Ciomas</span></p>
                        <p class="font-medium text-2xl mt-3 text-slate-600 md:w-[28rem]">ayo habiskan uang kalian untuk berbelanja di kantin kita tercinta... <span class="text-red-700">❤</span><span class="text-green-600">💸</span></p>
                        <a href="/barang" class="mt-6 px-3 py-2 inline-block w-auto font-extrabold text-xl rounded-lg border-[3px] shadow-lg border-yellow-400  bg-yellow-300 hover:bg-yellow-200 hover:border-yellow-300 hover:text-slate-500">ayo belanja</a> 
                    </div>
                    <div class="w-full px-4 self-end lg:w-1/2 " data-aos="zoom-in-left" data-aos-duration="1500">
                        <div class="mt-10 relative lg:mt-9 lg:right-0">
                        <img src="/img/landing/group.svg" alt="hero" class="max-w-full mx-auto animate-wiggle ">
                        <span class="absolute -bottom-12 -z-10 left-1/2 -translate-x-1/2 md:scale-150 md:bottom-28 lg:scale-125 lg:bottom-1 xl:scale-150 xl:bottom-24">
                        <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path 
                             fill="#F1C21B" d="M68.8,-31C83,-15.3,83.9,16.9,70.2,37.6C56.6,58.2,28.3,67.5,0.9,67C-26.4,66.4,-52.8,56.1,-64.5,36.5C-76.2,16.9,-73.3,-11.8,-60.1,-27C-46.9,-42.3,-23.4,-43.9,2,-45.1C27.4,-46.2,54.7,-46.8,68.8,-31Z" transform="translate(100 100) scale(1.2)" 
                            />
                          </svg>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Hero Section --}}


        {{-- Start Barang Section --}}
        <section id="barang" class="pt-36" >
            <div class="container">
                <div class="w-full px-4 ">
                   <div class="mx-auto text-center">
                    <h3 class="text-3xl font-bold">Mari Belanja</h3>
                   </div>
                </div>
            
                <div class="flex flex-wrap justify-evenly lg:justify-between my-10">  

                    <div class="w-10/12 px-7 md:w-1/2 lg:w-1/3" data-aos="fade-up" data-aos-duration="2000">
                      <div class="bg-primary rounded-xl overflow-hidden shadow-xl mb-10 text-center mx-auto ring-1 ring-yellow-500 hover:bg-gradient-to-tl hover:from-yellow-600 hover:to-oren group relative pb-10">
                        <div class="pt-5 border-b-4 border-oren group-hover:border-primary">
                            <a href="/barang" class="block mb-3 font-bold  group-hover:text-white truncate text-2xl text-slate-600 transition duration-100 ease-in-out">Biskuat</a>
                          </div>
                        <img src="/img/landing/barang/biskuat.svg" alt="programming" class="mx-auto group-hover:scale-110 transition duration-300 ease-in-out" />
                        <div class=" absolute bottom-5 right-0 left-0">
                            <a href="/barang" class="font-bold text-lg px-4 py-2 rounded-lg text-white group-hover:bg-yellow-300 group-hover:text-blue-700 bg-oren transition duration-100 ease-in-out">Rp. 500-</a>
                          </div>
                      </div>
                    </div>

                    <div class="w-10/12 px-7 md:w-1/2 lg:w-1/3 " data-aos="fade-up" data-aos-duration="2500">
                        <div class="bg-primary rounded-xl overflow-hidden shadow-xl mb-10 text-center mx-auto ring-1 ring-yellow-500 hover:bg-gradient-to-tl hover:from-yellow-600 hover:to-oren group relative pb-10">
                          <div class="pt-5 border-b-4 border-oren group-hover:border-primary">
                              <a href="/barang" class="block mb-3 font-bold  group-hover:text-white truncate text-2xl text-slate-600 transition duration-100 ease-in-out">Teh Pucuk</a>
                            </div>
                          <img src="/img/landing/barang/pucuk.svg" alt="programming" class="mx-auto group-hover:scale-110 transition duration-300 ease-in-out" />
                          <div class=" absolute bottom-5 right-0 left-0">
                              <a href="/barang" class="font-bold text-lg px-4 py-2 rounded-lg text-white group-hover:bg-yellow-300 group-hover:text-blue-700 bg-oren transition duration-100 ease-in-out ">Rp. 3000-</a>
                            </div>
                        </div>
                      </div>

                      <div class="w-10/12 px-7 md:w-1/2 lg:w-1/3" data-aos="fade-up" data-aos-duration="3000">
                        <div class="bg-primary rounded-xl overflow-hidden shadow-xl mb-10 text-center mx-auto ring-1 ring-yellow-500 hover:bg-gradient-to-tl hover:from-yellow-600 hover:to-oren group relative pb-16">
                          <div class="pt-5 border-b-4 border-oren group-hover:border-primary">
                              <a href="/barang" class="block mb-3 font-bold  group-hover:text-white truncate text-2xl text-slate-600 transition duration-100 ease-in-out">Pop Mie</a>
                            </div>
                          <img src="/img/landing/barang/popmie1.svg" alt="programming" class="mx-auto group-hover:scale-110 transition duration-300 ease-in-out" />
                          <div class="absolute bottom-5 right-0 left-0">
                              <a href="/barang" class="font-bold text-lg px-4 py-2 rounded-lg text-white group-hover:bg-yellow-300 group-hover:text-blue-700 bg-oren transition duration-100 ease-in-out">Rp. 6000-</a>
                            </div>
                        </div>
                      </div>

                      <div class="w-10/12 px-7 md:w-1/2  md:invisible lg:visible lg:w-1/3 mx-auto">
                        <img src="/img/landing/barang/carts2.svg" alt="programming" class="mx-auto scale-150" />
                      </div>
                      
                      <div class="w-10/12 px-7 md:w-1/2  lg:w-1/3 mx-auto">
                          <div class="pt-10  text-center justify-center">
                              <a href="/barang" class="font-bold text-lg px-4 py-2 rounded-lg text-white hover:bg-sky-600 hover:text-slate-200 bg-sky-700 transition duration-100 ease-in-out mx-auto" data-aos="fade-up" data-aos-duration="3200">Cek Selengkapnya....</a>
                            </div>
                        </div>

                        <div class="w-10/12 px-7 md:w-1/2 md:invisible lg:visible lg:w-1/3 mx-auto">
                            <img src="/img/landing/barang/carts.svg" alt="programming" class="mx-auto scale-125" />
                          </div>

                      </div>
                </div>
            </div>
        </section>
        {{-- End Barang Section --}}

        <section id="footer" class="pt-32">
            <footer class="bg-white">
                <div class="py-6 px-4 bg-sky-800 md:flex md:items-center md:justify-between ">
                    <span class="text-md text-white dark:text-gray-300 sm:text-center ">© <a href="https://github.com/NazalPrastya">Dibuat oleh Nazal Gusti Prastya</a>. Media Sosial...
                    </span>
                    <div class="flex mt-4 space-x-4  md:mt-0">
                        <a href="https://github.com/NazalPrastya" class="w-9 h-9  rounded-full flex justify-center item-center border border-white hover:border-primary hover:bg-primary hover:text-white text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>GitHub</title>
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                            </a>

                        <a href="https://www.instagram.com/nzlprst" class="w-9 h-9 mr-3 rounded-full flex justify-center item-center border border-white hover:border-primary hover:bg-primary hover:text-white text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                            </a>

                         <a href="https://www.facebook.com/nazalgusti.prastya" class="w-9 h-9 mr-3 rounded-full flex justify-center item-center border border-white hover:border-primary hover:bg-primary hover:text-white text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                          
                        <a href="https://id.pinterest.com/nazalprastya/" class="w-9 h-9 mr-3 rounded-full flex justify-center item-center border border-white hover:border-primary hover:bg-primary hover:text-white text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Pinterest</title><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/></svg>
                            </a>
                        
                        <a href="https://www.youtube.com/channel/UCVKJ2q5leM_-p2FfZ5LN7dw" class="w-9 h-9 mr-3 rounded-full flex justify-center item-center border border-white hover:border-primary hover:bg-primary hover:text-white text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                    </div>
                </div>
            </footer>
        </section>

        @vite('resources/js/app.js')
        <script src="../path/to/flowbite/dist/flowbite.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
          AOS.init();
        </script>
    </body>
</html>
