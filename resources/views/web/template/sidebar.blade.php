<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
            <i style="color:#ffab00" class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Halaman</span>
    </li>

    <!-- Layouts -->
    <li class="menu-item {{ Request::segment(1) == 'pendaftaran' ? 'active' : '' }}">
        <a href="/pendaftaran" class="menu-link">
            <i style="color:#71dd37;" class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Pendaftaran</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'data-kost' ? 'active' : '' }}">
        <a href="/data-kost" class="menu-link">
            <i style="color:#696cff" class="menu-icon tf-icons bx bx-home"></i>
            <div data-i18n="Account Settings">Data Kost</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'booking' ? 'active' : '' }}">
        <a href="/booking" class="menu-link">
            <i style="color:#fd7e14;" class="menu-icon tf-icons bx bx-key"></i>
            <div data-i18n="Account Settings">Booking Kost</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'transaksi' ? 'active' : '' }}">
        <a href="/transaksi" class="menu-link">
            <i style="color:#03c3ec;" class="menu-icon tf-icons bx bx-transfer"></i>
            <div data-i18n="Authentications">Transaksi</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'rekening' ? 'active' : '' }}">
        <a href="/rekening" class="menu-link">
            <i style="color:#07667b;" class='menu-icon tf-icons bx bxs-bank'></i>
            <div data-i18n="Authentications">Rekening</div>
        </a>
    </li>
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">PENGATURAN</span>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'pengguna' ? 'active' : '' }}">
        <a href="/pengguna" class="menu-link">
            <i style="color:#e83e8c"class='menu-icon tf-icons bx bxs-user-detail'></i>
            <div data-i18n="Authentications">Pengguna</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'profil' ? 'active' : '' }}">
        <a href="/profil" class="menu-link">
            <i style="color:#007bff;" class="menu-icon tf-icons bx bx-user me-2"></i>
            <div data-i18n="Authentications">Profil</div>
        </a>
    </li>
    <li class="menu-item {{ Request::segment(1) == 'setting' ? 'active' : '' }}">
        <a href="/setting" class="menu-link">
            <i style="color:#ffae00;" class="menu-icon tf-icons bx bx-cog"></i>
            <div data-i18n="Authentications">Setting</div>
        </a>
    </li>
</ul>
