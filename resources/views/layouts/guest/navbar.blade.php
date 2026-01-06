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

                                @if (session('role') == 'Super Admin')
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                            href="{{ route('users.index') }}">Manajemen Data User & Warga</a>
                                    </li>
                                @endif

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

                        <div class="dropdown ms-auto position-relative">
                            @if (session('is_login'))
                                <button class="btn bg-danger text-white rounded-pill dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Selamat Datang!
                                    {{-- Hai, {{ Auth::user()->name }}! --}}
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end shadow rounded-3">
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                            href="{{ route('dashboard') }}">
                                            <i class="fa-solid fa-gauge-high me-2"></i> Dashboard Warga
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('warga-guest.index') ? 'active' : '' }}"
                                            href="{{ route('warga-guest.index') }}">
                                            <i class="fa-regular fa-id-card me-2"></i> Data Diri
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fa-solid fa-right-from-bracket me-2"></i> Keluar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-danger">
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
