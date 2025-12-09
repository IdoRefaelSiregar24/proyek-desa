    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">

            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route(name: 'dashboard') }}">
                        <img src="{{ asset('/images/logoHorizontal.svg') }}" alt="Logo">
                    </a>

                    <!-- Menu -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav me-auto" id="menu">
                                <li class="nav-item submenu">
                                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                        href="{{ route('dashboard') }}">Beranda</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="index.html">Home - Image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-2.html">Home - Slider</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="index-3.html">Home - Video</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('proyek-guest.index') ? 'active' : '' }}"
                                        href="{{ route('proyek-guest.index') }}">Proyek</a>
                                </li>

                                @auth
                                    @if (auth()->user()->role === 'super_admin')
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                                                href="">Manajemen Data User</a>
                                        </li>
                                    @endif
                                @endauth


                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                                        href="{{ route('about') }}">Tentang</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('detail-pengembang') ? 'active' : '' }}"
                                        href="{{ route('detail-pengembang') }}">Profil Pengembang</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}"
                                        href="">Layanan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Kontak</a>
                                </li>
                            </ul>
                        </div>

                        <div class="position-relative ms-auto">
                            @if (Auth::check())
                                <button id="dropdownButton"
                                    class="d-flex align-items-center gap-2 px-3 py-2 bg-danger text-white rounded-pill border-0 shadow-sm">
                                    <span class="fw-semibold">
                                        Hai, {{ Auth::user()->name }}!
                                    </span>
                                    <i class="bi bi-caret-down-fill"></i>
                                </button>
                                <div id="dropdownMenu"
                                    class="dropdown-menu dropdown-menu-end shadow mt-2 rounded-3 border-0"
                                    style="display: none; position: absolute; right: 0;">

                                    <a class="dropdown-item d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                        href="{{ route('dashboard') }}">
                                        <i class="fa-solid fa-gauge-high me-2 text-dark"></i> Dashboard Warga</i>
                                    </a>

                                    <a class="dropdown-item d-flex align-items-center {{ request()->routeIs('warga-guest.index') ? 'active' : '' }}"
                                        href="{{ route('warga-guest.index') }}">
                                        <i class="fa-regular fa-id-card me-2 text-success"></i> Data Diri
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex align-items-center text-danger">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i> Keluar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-danger px-3 py-2">
                                    Login
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <script>
        const btn = document.getElementById("dropdownButton");
        const menu = document.getElementById("dropdownMenu");

        if (btn) {
            btn.addEventListener("click", function(event) {
                event.stopPropagation();
                menu.style.display = (menu.style.display === "block") ? "none" : "block";
            });
        }

        // Tutup dropdown jika klik di luar
        document.addEventListener("click", function() {
            if (menu) menu.style.display = "none";
        });
    </script>

    <!-- Header End -->
