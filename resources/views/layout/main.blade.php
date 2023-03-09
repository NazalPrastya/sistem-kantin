<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/img/logo.png" class="scale-150">

        <title>Sistem Informasi Koperasi |</title>
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
           
        <!-- My Style -->
            {{-- <link rel="stylesheet" href="/css/dashboard/style.css" /> --}}
            <link rel="stylesheet" href="/css/dashboard/sidebar/style.css" />


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            
        </style>

          @vite('resources/css/app.css')
    </head>
    <body>
        {{-- <div class="containers">
            @include('layout.sidebar')
          <div class="main-content">
            <div id="menu-button" class="ml-2 mt-2">
              <input type="checkbox" id="menu-checkbox" />
              <label for="menu-checkbox" id="menu-label">
                <div id="hamburger"></div>
              </label>
            </div>
            <div style="margin-left: 10px">
              @yield('content')
            </div>
          </div>
        </div> --}}
        @include('layout.sidebar2')
        <section class="home-section">
          <div class="home-content">
            <i class="bx bx-menu"></i>
            @if ((Auth::guard('admin')->user()))
                
            <div class="absolute right-3  top-5">
              <div class="w-auto justify-end text-end items-end">
              <form action="/logout" method="post" class="inline-block text-end items-end">
                @csrf
                <button type="submit" class="p-1 px-2 bg-red-600 rounded-lg text-white font-bold hover:bg-red-700">Logout</button>
              </form>
             </div>
            </div> 
          @endif
          </div>


          </div>
          @yield('content')
        </section>


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
        @vite('resources/js/app.js')
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>