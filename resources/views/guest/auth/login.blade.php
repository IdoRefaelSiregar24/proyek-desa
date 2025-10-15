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
    <title>Desa Balam Sempurna</title>
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

                        <h3 class="fw-bold text-white">Login Akun</h3>
                        <p class="text-light mb-4">Masuk untuk memantau dan mengelola proyek desa</p>

                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3 text-start">
                                <label for="username" class="form-label text-light">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Masukkan username" required>
                            </div>

                            <div class="mb-4 text-start">
                                <label for="password" class="form-label text-light">Kata Sandi</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password" required>
                            </div>

                            <button type="submit" class="btn btn-danger w-100 py-2">Masuk</button>

                            <div class="text-center mt-3 text-light">
                                Belum punya akun?
                                <a href="" class="text-warning text-decoration-none">Daftar
                                    Sekarang</a>
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
