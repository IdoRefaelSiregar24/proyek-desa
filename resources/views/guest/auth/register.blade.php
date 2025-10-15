<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <!-- Page Title -->
    <title>Register || Desa Balam Sempurna</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{ asset('assets-guest/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/swiper-bundle.min.css') }}">
    <!-- Font Awesome Icon Css-->
    <link href="{{ asset('assets-guest./css/all.css') }}" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="{{ asset('assets-guest/css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/magnific-popup.css') }}">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/mousecursor.css') }}">
    <!-- Main Custom Css -->
    <link href="{{ asset('assets-guest/css/custom.css') }}" rel="stylesheet" media="screen">
    <style>
        .btn-default,
        .preloader,
        .testimonial-slider .swiper-pagination .swiper-pagination-bullet,
        .btn-default.btn-highlighted::after,
        .main-menu ul ul {
            background: #EF151B !important;
        }

        .section-title h3,
        .about-content-body ul li:before,
        .testimonial-rating i,
        .faq-accordion .accordion-button:not(.collapsed),
        .post-item-footer .readmore-btn,
        .footer-links h3,
        .footer-copyright .footer-social-links ul li a,
        .service-content-footer .readmore-btn,
        .project-content-footer .readmore-btn {
            color: #EF151B !important;
        }

        .footer-copyright .footer-social-links ul li a {
            border: 2px solid #EF151B !important;
        }

        .btn-default.btn-highlighted:hover,
        .btn-default.btn-highlighted {
            border-color: #EF151B !important;
        }

        .hero {
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .overlay-dark {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            /* Lapisan gelap */
            z-index: 1;
        }

        .hero .container {
            position: relative;
            z-index: 2;
            /* Supaya form di atas overlay */
        }

        .login-card {
            background: rgba(255, 255, 255, 0.08);
            /* Efek transparan halus */
            backdrop-filter: blur(8px);
            /* Blur background */
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>

<body>

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="images/loader.svg" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    {{-- Navbar --}}
    @include('guest/layouts.navbar')

    <!-- Hero Section Start -->
    <div class="hero bg-section parallaxie position-relative d-flex align-items-center justify-content-center"
        style="min-height: 100vh;">
        <!-- Overlay -->
        <div class="overlay-dark"></div>

        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 col-12">
                    <div class="login-card text-center wow fadeInUp" data-wow-delay="0.3s">
                        <img src="{{ asset('assets-guest/images/165x47 logo.svg') }}" alt="Logo" class="mb-3"
                            height="45">

                        <h3 class="fw-bold text-white">Daftar Akun Anda</h3>
                        <p class="text-light mb-4">Daftar untuk memantau dan mengelola proyek desa</p>

                        {{-- Flash message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- Form Register --}}
                        <form action="{{ route('register') }}" method="POST" novalidate>
                            @csrf

                            {{-- Nama Lengkap --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Masukkan Email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Konfirmasi Password --}}
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Ulangi Password" required>
                            </div>

                            {{-- Tombol Submit --}}
                            <button type="submit" class="btn btn-warning w-100 fw-bold py-2">Daftar Sekarang</button>

                            <div class="text-center mt-3">
                                <small class="text-light">Sudah punya akun?
                                    <a href="{{ route('login') }}" class="text-warning text-decoration-none">Masuk di
                                        sini</a>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <br>

    {{-- Navbar --}}
    @include('guest/layouts.footer')

    <!-- Jquery Library File -->
    <script src="{{ asset('assets-guest/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js file -->
    <script src="{{ asset('assets-guest/js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('assets-guest/js/validator.min.js') }}"></script>
    <!-- SlickNav js file -->
    <script src="{{ asset('assets-guest/js/jquery.slicknav.js') }}"></script>
    <!-- Swiper js file -->
    <script src="{{ asset('assets-guest/js/swiper-bundle.min.js') }}"></script>
    <!-- Counter js file -->
    <script src="{{ asset('assets-guest/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.counterup.min.js') }}"></script>
    <!-- Magnific js file -->
    <script src="{{ asset('assets-guest/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- SmoothScroll -->
    <script src="{{ asset('assets-guest/js/SmoothScroll.js') }}"></script>
    <!-- Parallax js -->
    <script src="{{ asset('assets-guest/js/parallaxie.js') }}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ asset('assets-guest/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/magiccursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('assets-guest/js/SplitText.js') }}"></script>
    <script src="{{ asset('assets-guest/js/ScrollTrigger.min.js') }}"></script>
    <!-- Wow js file -->
    <script src="{{ asset('assets-guest/js/wow.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('assets-guest/js/function.js') }}"></script>
</body>

</html>
