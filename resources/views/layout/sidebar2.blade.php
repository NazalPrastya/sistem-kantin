<div class="sidebar close">
    <div class="logo-detail">
      <img src="/img/sidebar/shop.svg" alt="logo" class="mx-auto" />
    </div>
    <ul class="nav-links space-y-2">
      <li class="rounded-l-full mx-auto text-center">
        <a href="/dashboard" class="text-center mx-auto">
          <span class="link_name font-[1000] text-center mx-auto text-3xl tracking-wider text-[#ffaa29]" style="-webkit-text-stroke: 0.1rem white">SIKANTIN</span>
        </a>
      </li>

      <li class="group ml-3 rounded-l-full hover:bg-[#eeeeee] {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="group ">
          <i class="bx bxs-dashboard group-hover:text-[#FFAA29]  {{ Request::is('dashboard') ? 'text-[#FFAA29]' : 'text-[#eee]' }}"></i>
          <span class="link_name text-white font-bold group-hover:text-[#ffaa29] {{ Request::is('dashboard') ? 'text-[#FFAA29]' : '' }}">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard">Dashboard</a></li>
        </ul>
      </li>

      <li class="group ml-3 rounded-l-full hover:bg-[#eeeeee] {{ Request::is('dashboard/barang') ? 'active' : '' }}">
        <a href="/dashboard/barang" class="group">
          <i class="bx bx-store group-hover:text-[#FFAA29]  {{ Request::is('dashboard/barang') ? 'text-[#FFAA29]' : 'text-[#eee]' }}"></i>
          <span class="link_name text-white font-bold group-hover:text-[#ffaa29] {{ Request::is('dashboard/barang*') ? 'text-[#FFAA29]' : 'text-[#eee]' }}">Barang</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard/barang">Barang</a></li>
        </ul>
      </li>

      <li class="group ml-3 rounded-l-full hover:bg-[#eeeeee] {{ Request::is('dashboard/admin') ? 'active' : '' }}">
        <a href="/dashboard/admin" class="group">
          <i class="bx bx-user-plus group-hover:text-[#FFAA29]  {{ Request::is('dashboard/admin') ? 'text-[#FFAA29]' : 'text-[#eee]' }}"></i>
          <span class="link_name text-white font-bold group-hover:text-[#ffaa29] {{ Request::is('dashboard/admin*') ? 'text-[#FFAA29]' : 'text-[#eee]' }}">Admin</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard/admin">Admin</a></li>
        </ul>
      </li>


      <li class="group ml-3 rounded-l-full hover:bg-[#eeeeee] {{ Request::is('dashboard/carousel') ? 'active' : '' }}">
        <a href="/dashboard/carousel" class="group">
          <i class="bx bx-image-alt group-hover:text-[#FFAA29]  {{ Request::is('dashboard/carousel') ? 'text-[#FFAA29]' : 'text-[#eee]' }}"></i>
          <span class="link_name text-white font-bold group-hover:text-[#ffaa29] {{ Request::is('dashboard/carousel') ? 'text-[#FFAA29]' : 'text-[#eee]' }}">Banner</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard/carousel">Banner</a></li>
        </ul>
      </li>


      <li class="group ml-3 rounded-l-full hover:bg-[#eeeeee] {{ Request::is('dashboard/riwayat') ? 'active' : '' }}">
        <a href="/dashboard/riwayat" class="group">
          <i class="bx bx-time group-hover:text-[#FFAA29] {{ Request::is('dashboard/riwayat') ? 'text-[#FFAA29]' : 'text-[#eee]' }}"></i>
          <span class="link_name text-white font-bold group-hover:text-[#ffaa29] {{ Request::is('dashboard/riwayat') ? 'text-[#FFAA29]' : '' }}">Riwayat</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard/riwayat">Riwayat</a></li>
        </ul>
      </li>

      <li class="group ml-3 rounded-l-full hover:bg-[#eeeeee] {{ Request::is('dashboard/saran') ? 'active' : '' }}">
        <a href="/dashboard/saran" class="group">
          <i class="bx bx-chat group-hover:text-[#FFAA29] {{ Request::is('dashboard/saran') ? 'text-[#FFAA29]' : 'text-[#eee]' }}"></i>
          <span class="link_name text-white font-bold group-hover:text-[#ffaa29] {{ Request::is('dashboard/saran') ? 'text-[#FFAA29]' : '' }}">Saran</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard/saran">Saran</a></li>
        </ul>
      </li>

    </ul>
  </div>