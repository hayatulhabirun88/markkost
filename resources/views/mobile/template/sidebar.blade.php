<ul>
    @if (Auth::check())
        <li>
            <a href="/mobile/logout">
                <i class="mdi mdi-logout"></i>
                <span> Keluar</span>
            </a>
        </li>
    @endif

    <li>
        <a href="/mobile/dashboard">
            <i class="mdi mdi-home"></i>
            <span>Home</span>
        </a>
    </li>
    <li>
        <a href="/mobile/cari">
            <i class="mdi mdi-magnify"></i>
            <span>Cari</span>
        </a>
    </li>
</ul>
