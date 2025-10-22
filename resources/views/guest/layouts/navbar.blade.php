    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="./">
                        <img src="{{ asset('assets-guest/images/165x47 logo.svg') }}" alt="Logo">
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item submenu"><a class="nav-link" href="./">Home</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="index.html">Home - Image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-2.html">Home - Slider</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="index-3.html">Home - Video</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="about.html">Proyek</a></li>
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
                                <li class="nav-item highlighted-menu"><a class="nav-link" href="contact.html">Contact
                                        Us</a></li>
                            </ul>
                            <ul class="navbar-nav mr-auto" id="menu">

                            </ul>
                        </div>
                        <!-- Tombol Login / Profil -->
                        @guest
                            <!-- Tampilkan tombol login jika belum login -->
                            <a href="{{ route('login.show') }}" class="btn-default">Login</a>
                        @endguest

                        <a href=""class="btn-profile flex items-center gap-2 px-3 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                            @auth
                                <div class="welcome-message text-gray-700 font-semibold">
                                    Hai, Selamat Datang {{ Auth::user()->name }}!
                                </div>
                            @endauth
                        </a>

                        <!-- Tombol Login / Profil End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->
