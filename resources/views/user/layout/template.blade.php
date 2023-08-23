
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/img/logo.png" class="scale-150">

        <title>Sistem Informasi Kantin</title>
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
        <!-- Link Swiper's CSS -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        {{-- Midtrans --}}
         <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript"
          src="https://app.sandbox.midtrans.com/snap/snap.js"
          data-client-key="{{ config('midtrans.client_key') }}"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

        <!-- My Style -->
            {{-- <link rel="stylesheet" href="/css/dashboard/style.css" /> --}}
            <link rel="stylesheet" href="/css/dashboard/sidebar/style.css" />
        


        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
            .swiper {
              width: 100%;
              height: 100%;
          }

          .swiper-slide {
              text-align: center;
              font-size: 18px;
              background: #fff;
              display: flex;
              justify-content: center;
              align-items: center;
          }

        

        </style>
        {{-- mystyle --}}
        <link rel="preload" as="style" href="/build/assets/app-be74ee1a.css" />
        <link rel="stylesheet" href="/build/assets/app-be74ee1a.css" />

    </head>
    <body>
      @include('sweetalert::alert')
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
                  <ul class="block lg:flex lg:mx-auto">
                    <li class="group">
                      <a href="/" class="text-lg text-dark py-2 mx-8 flex hover:text-primary active:font-bold active:text-black ">Beranda</a>
                    </li>
                    <li class="group">
                      <a href="/barang" class="text-lg text-dark py-2 mx-8 flex hover:text-primary active:font-bold active:text-black {{ Request::is('barang') ? 'font-bold text-oren' : '' }}">Barang</a>
                    </li>

                    @if ((Auth::guard('user')->user()))
                        
                    <li class="group">
                      <a href="/saran" class="text-lg text-dark py-2 mx-8 flex hover:text-primary active:font-bold active:text-black {{ Request::is('saran') ? 'font-bold text-oren' : '' }}">Saran</a>
                    </li>

                    <li class="group">
                      <a href="/riwayat" class="text-lg text-dark py-2 mx-8 flex hover:text-primary active:font-bold active:text-black {{ Request::is('riwayat') ? 'font-bold text-oren' : '' }}">Riwayat</a>
                    </li>

                    <li class="group">
                      <a href="/keranjang" class="text-4xl font-extrabold text-dark mx-8 py-2 text-[#FFAA29] hover:text-yellow-300 relative"><i class="bx bxs-cart"></i>
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full top-1 -right-3 dark:border-gray-900">{{ $carts->count() }}</div>
                      </a>
                    </li>
                    @endif

                    @if ((Auth::guard('user')->user()))
                      
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-primary hover:bg-oren focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center " type="button">{{ auth()->guard()->user()->name }}<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                          <li>
                            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                          </li>
                          <li>
                            <form action="/logout" method="post" class="p-3 hover:bg-red-100">
                              @csrf
                              <button type="submit">Logout</button>
                            </form>
                          </li>
                        </ul>
                    </div>
                    @else
                    <li class="group">
                      <a href="/login" class="text-base mt-1 font-extrabold text-dark mx-8 flex group-hover:bg-yellow-400 w-auto bg-yellow-300 px-5 py-1 rounded-lg border-2 border-oren ">Login</a>
                    </li>
                    @endif
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </header>
      {{-- End Navbar --}}

        <div class=" pt-10">
            @yield('content')
        </div>


        <script>

        // Responsive sidebar
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        function previewImage()
        {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        } 
      </script>
         {{-- my js --}}
        <link rel="modulepreload" href="/build/assets/app-d4180086.js" />
        <script type="module" src="/build/assets/app-d4180086.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

          <!-- Initialize Swiper -->
          <script>
            var swiper = new Swiper(".mySwiper", {
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
              pagination: {
              el: ".swiper-pagination",
            },
            loop:true,
            autoplay: {
              delay:3000,
              disableOnInteraction: false,
            }
            
            });
          </script>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>