    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">

            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route(name: 'dashboard') }}">
                        <img src="{{ asset('/images/logoHorizontal.svg') }}" alt="Logo">
                    </a>

                    <!-- Toggle -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <!-- Menu -->
                   <div class="collapse navbar-collapse main-menu" id="mainNavbar">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav me-auto" id="menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                        href="{{ route('dashboard') }}">Beranda</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('proyek-guest.index') ? 'active' : '' }}"
                                        href="{{ route('proyek-guest.index') }}">Proyek</a>
                                </li>

                                @auth
                                    @if (auth()->user()->role === 'super_admin')
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                                href="{{ route('users.index') }}">Manajemen Data User & Warga</a>
                                        </li>
                                    @endif
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('kontraktor.index') ? 'active' : '' }}"
                                        href="{{ route('kontraktor.index') }}">kontraktor</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                                        href="{{ route('about') }}">Tentang</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('developer') ? 'active' : '' }}"
                                        href="{{ route('developer') }}">Profil Pengembang</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                                        href="{{ route('services') }}">Layanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                                        href="{{ route('contact') }}">Kontak</a>
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
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>


    <!-- Header End -->
