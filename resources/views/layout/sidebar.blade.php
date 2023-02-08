
<div class="sidebar">
   <div class="header ">
     <div class="illustration items-center scale-110">
       <img src="/img/sidebar/shop.svg" alt="" class="mx-auto" />
     </div>
     <div class="mx-auto text-center ">
      <a href="/dashboard">
        <span class="description-header text-3xl font-[1000] bold text-[#FFAA29] tracking-wider border-b-4 rounded-b-sm" style="-webkit-text-stroke: 0.1rem white">SIKOOPER</span>
        
      </a>
    </div>
   </div>

   <div class="main mt-4 py-3 pl-12 ">

    <a href="/dashboard">
     <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee]  group {{ Request::is('dashboard') ? 'active' : '' }}">
         <img src="/img/sidebar/icon/dashboard.svg" alt="" class=" inline">
         <span class="description text-white group-hover:text-[#FFAA29] {{ Request::is('dashboard') ? 'text-[#FFAA29]' : '' }}">Dashboard</span>
     </div>
    </a>

    <a href="/dashboard/barang">
     <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee] mt-2  group {{ Request::is('dashboard/barang') ? 'active' : '' }}">
        <img src="/img/sidebar/icon/barang.svg" alt="" class=" inline">
         <span class="description text-white group-hover:text-[#FFAA29] {{ Request::is('dashboard/barang') ? 'text-[#FFAA29]' : '' }}">Barang</span>
     </div>
    </a>

    <a href="/dashboard/cart">
      <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee] mt-2  group  {{ Request::is('dashboard/cart') ? 'active' : '' }}" >
         <img src="/img/sidebar/icon/cart.svg" alt="" class=" inline">
          <span class="description text-white group-hover:text-[#FFAA29] {{ Request::is('dashboard/cart') ? 'text-[#FFAA29]' : '' }}">Keranjang</span>
      </div>
     </a>
 
    <a href="/dashboard/riwayat">
     <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee] mt-2  group {{ Request::is('dashboard/riwayat') ? 'active' : '' }}">
        <img src="/img/sidebar/icon/riwayat.svg" alt="" class=" inline">
         <span class="description text-white group-hover:text-[#FFAA29] {{ Request::is('dashboard/riwayat') ? 'text-[#FFAA29]' : '' }}">Riwayat</span>
     </div>
    </a>
  
    <a href="/dashboard/saran">
      <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee] mt-2  group  {{ Request::is('dashboard/saran') ? 'active' : '' }}" >
         <img src="/img/sidebar/icon/saran.svg" alt="" class=" inline">
          <span class="description text-white group-hover:text-[#FFAA29] ml-2 {{ Request::is('dashboard/saran') ? 'text-[#FFAA29]' : '' }}">Saran</span>
      </div>
     </a>
    
    <a href="/">
     <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee] mt-2  group  -ml-2">
        <img src="/img/sidebar/icon/back1.svg" alt="" class="inline ml-2">
         <span class="description text-white group-hover:text-[#FFAA29] ml-2">Layar utama</span>
     </div>
    </a>

    {{-- Logout --}}
     {{-- <div class="list-item py-2 px-3 rounded-l-lg hover:bg-[#eeeeee] mt-2  group  nav-item">
      <img src="/img/sidebar/icon/logout.svg" alt="" class="inline">
       <form action="/logout" method="post">
         @csrf
         <i class="bi bi-box-arrow-left" style="color: blue"></i>
         <span class="description text-white group-hover:text-[#FFAA29] ml-2"> <button class="description text-white group-hover:text-[#FFAA29] ms-2 tombol" type="submit" style="border: 0" onclick="return confirm('Ingin logout?')">logout</button></span>
       </form>
     </div> --}}

      <a href="/login" class="text-xl inline-block ">
       <div class="list-item mt-2 group font-extrabold  text-center p-2 rounded-md text-white bg-[#FFAA29]">
        <span class="description text-white group-hover:text-[#FFAA29] ml-2 text-center">Admin</span>
       </div>
      </a>

   </div>
 </div>
 