    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="./">
                        <img src="{{ asset('assets-guest/images/165x47 logo.svg') }}" alt="Logo">
                    </a>

                    <!-- Menu -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav me-auto" id="menu">
                                <li class="nav-item submenu"><a class="nav-link" href="./">Home</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="index.html">Home - Image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-2.html">Home - Slider</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="index-3.html">Home - Video</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('proyek.index')}}">Proyek</a></li>
                                <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                <li class="nav-item submenu"><a class="nav-link" href="#">Pages</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link" href="service-single.html">Service
                                                Details</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog-single.html">Blog
                                                Details</a></li>
                                        <li class="nav-item"><a class="nav-link" href="project.html">Project</a></li>
                                        <li class="nav-item"><a class="nav-link" href="project-single.html">Project
                                                Details</a></li>
                                        <li class="nav-item"><a class="nav-link" href="team.html">Our Team</a></li>
                                        <li class="nav-item"><a class="nav-link" href="faqs.html">FAQ</a></li>
                                        <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="position-relative ms-auto">
                            @auth
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
                                    <a class="dropdown-item" href="{{ route('warga.index') }}">Dashboard Warga</a>
                                    <a class="dropdown-item" href="{{ route('warga.index') }}">Data Diri</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-danger px-3 py-2">
                                    Login
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Script Toggle Dropdown -->
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const button = document.getElementById("dropdownButton");
                    const menu = document.getElementById("dropdownMenu");

                    if (button) {
                        button.addEventListener("click", (e) => {
                            e.stopPropagation();
                            const isVisible = menu.style.display === "block";
                            menu.style.display = isVisible ? "none" : "block";
                        });
                    }

                    // Tutup dropdown saat klik di luar
                    window.addEventListener("click", (e) => {
                        if (menu && !menu.contains(e.target) && !button.contains(e.target)) {
                            menu.style.display = "none";
                        }
                    });
                });
            </script>
        </div>
        <!-- Main Menu End -->
        <div class="navbar-toggle"></div>
        </div>
        </nav>
        <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->
