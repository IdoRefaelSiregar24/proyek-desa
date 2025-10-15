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
	<link rel="shortcut icon" type="image/x-icon" href="{{{ asset('assets-guest/images/favicon.png') }}}">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
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
        .btn-default, .preloader, .testimonial-slider .swiper-pagination .swiper-pagination-bullet, .btn-default.btn-highlighted::after, .main-menu ul ul

        {
            background: #EF151B!important;
        }
        .section-title h3, .about-content-body ul li:before, .testimonial-rating i, .faq-accordion .accordion-button:not(.collapsed), .post-item-footer .readmore-btn,
        .footer-links h3, .footer-copyright .footer-social-links ul li a, .service-content-footer .readmore-btn, .project-content-footer .readmore-btn
        {
            color: #EF151B!important;
        }
        .footer-copyright .footer-social-links ul li a
        {
            border: 2px solid #EF151B!important;
        }
        .btn-default.btn-highlighted:hover, .btn-default.btn-highlighted
        {
            border-color: #EF151B!important;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('guest/layouts.navbar')

    <!-- Preloader Start -->
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="images/loader.svg" alt=""></div>
		</div>
	</div>
	<!-- Preloader End -->

    <!-- Hero Section Start -->
	<div class="hero bg-section parallaxie">
		<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Welcome To JassaConstructions</h3>
                            <h1 class="text-anime-style-3" data-cursor="-opaque">OVER 20 YEARS EXPERIENCE IN BUILDING CONSTRUCTION</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in turning visions into reality with exceptional craftsmanship and meticulous attention to detail. With years of experience and a commitment to quality.</p>
                        </div>

                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default">get started</a>
                            <a href="#" class="btn-default btn-highlighted">view Projects</a>
                        </div>
                    </div>
                    <!-- Hero Content End -->
                </div>
            </div>
        </div>
	</div>
	<!-- Hero Section End -->

    <!-- About Section Start -->
    <div class="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <!-- About Us Image Start -->
                    <div class="about-image">
                        <div class="about-img">
                            <figure class="reveal">
                                <img src="{{ asset('assets-guest/images/about-us-img.png') }}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- About Us Image End -->
                </div>

                <div class="col-lg-7">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">about us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Building the Future Across Punjab</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Since its inception, JassaConstructions has led real estate development in Ludhiana, Punjab, with numerous completed, ongoing, and upcoming projects, and has expanded services to Haryana, Himachal Pradesh, and Jammu & Kashmir.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Content Body Start -->
                        <div class="about-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <ul>
                                <li>Comprehensive Services</li>
                                <li>Advanced Technology</li>
                                <li>Transparent Communication</li>
                            </ul>
                        </div>
                        <!-- About Content Body End -->

                        <!-- About Content Footer Start -->
                        <div class="about-content-footer wow fadeInUp" data-wow-delay="0.75s">
                            <div class="about-footer-btn">
                                <a href="#" class="btn-default">get free quote</a>
                            </div>
                            <div class="about-contact-support">
                                <div class="icon-box">
                                    <img src="{{ asset('assets-guest/images/icon-phone.svg') }}" alt="">
                                </div>
                                <div class="about-support-content">
                                    <p>call support center 24X7</p>
                                    <h3>+0123456789</h3>
                                </div>
                            </div>
                        </div>
                        <!-- About Content Footer End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Our Service Section Start -->
    <div class="our-service">
        <div class="light-bg-section">
            <div class="container-fluid">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">our services</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Our construction services</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction services, including residential, commercial, and industrial projects.</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Service Image Start -->
                            <div class="service-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="{{ asset('assets-guest/images/service-img-1.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Service Image End -->

                            <!-- Service Body Start -->
                            <div class="service-body">
                                <!-- Service Body Title Start -->
                                <div class="service-body-title">
                                    <h3>Residentail</h3>
                                </div>
                                <!-- Service Body Title End -->

                                <!-- Service Content Start -->
                                <div class="service-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="service-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Service Content End -->
                            </div>
                            <!-- Service Body End -->
                        </div>
                        <!-- Service Item End -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" data-wow-delay="0.5s">
                            <!-- Service Image Start -->
                            <div class="service-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="{{ asset('assets-guest/images/service-img-2.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Service Image End -->

                            <!-- Service Body Start -->
                            <div class="service-body">
                                <!-- Service Body Title Start -->
                                <div class="service-body-title">
                                    <h3>Commercial</h3>
                                </div>
                                <!-- Service Body Title End -->

                                <!-- Service Content Start -->
                                <div class="service-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="service-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Service Content End -->
                            </div>
                            <!-- Service Body End -->
                        </div>
                        <!-- Service Item End -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" data-wow-delay="0.75s">
                            <!-- Service Image Start -->
                            <div class="service-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="{{ asset('assets-guest/images/service-img-3.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Service Image End -->

                            <!-- Service Body Start -->
                            <div class="service-body">
                                <!-- Service Body Title Start -->
                                <div class="service-body-title">
                                    <h3>Industrial</h3>
                                </div>
                                <!-- Service Body Title End -->

                                <!-- Service Content Start -->
                                <div class="service-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="service-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Service Content End -->
                            </div>
                            <!-- Service Body End -->
                        </div>
                        <!-- Service Item End -->
                    </div>

                    <div class="col-lg-3 col-md-6 d-none">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" data-wow-delay="1s">
                            <!-- Service Image Start -->
                            <div class="service-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="{{ asset('assets-guest/images/service-img-4.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Service Image End -->

                            <!-- Service Body Start -->
                            <div class="service-body">
                                <!-- Service Body Title Start -->
                                <div class="service-body-title">
                                    <h3>building maintenance</h3>
                                </div>
                                <!-- Service Body Title End -->

                                <!-- Service Content Start -->
                                <div class="service-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="service-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Service Content End -->
                            </div>
                            <!-- Service Body End -->
                        </div>
                        <!-- Service Item End -->
                    </div>

                    <!-- Services Footer Btn Start -->
                    <div class="service-footer-btn wow fadeInUp" data-wow-delay="1.25s">
                        <a href="#" class="btn-default">view all services</a>
                    </div>
                    <!-- Services Footer Btn End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Service Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">why choose us?</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Why we're your best choice</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">Developed in close collaboration with our partners and clients, combines industry knowledge, decades of experience, ingenuity and adaptability to deliver excellence to our clients.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="{{ asset('assets-guest/images/icon-why-choose-1.svg') }}" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>innovation solutions</h3>
                            <p>Simple actions make a difference. It starts and ends with each employee striving to work safer every single day so they can return.</p>
                        </div>
                        <div class="why-choose-counter">
                            <h3><span class="counter">800</span>+</h3>
                            <p>project complated</p>
                        </div>
                    </div>
                    <!-- Why Choose Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Why Choose Image Start -->
                    <div class="why-choose-image">
                        <figure class="image-anime reveal">
                            <img src="images/why-choose-img-1.jpg" alt="">
                        </figure>
                    </div>
                    <!-- Why Choose Image End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-item wow fadeInUp"  data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="images/icon-why-choose-2.svg" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>quality craftsmanship</h3>
                            <p>Simple actions make a difference. It starts and ends with each employee striving to work safer every single day so they can return.</p>
                        </div>
                        <div class="why-choose-counter">
                            <h3><span class="counter">800</span>+</h3>
                            <p>project complated</p>
                        </div>
                    </div>
                    <!-- Why Choose Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Why Choose Image Start -->
                    <div class="why-choose-image">
                        <figure class="image-anime reveal">
                            <img src="images/why-choose-img-2.jpg" alt="">
                        </figure>
                    </div>
                    <!-- Why Choose Image End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="images/icon-why-choose-3.svg" alt="">
                        </div>
                        <div class="why-choose-content">
                            <h3>expertise and experience</h3>
                            <p>Simple actions make a difference. It starts and ends with each employee striving to work safer every single day so they can return.</p>
                        </div>
                        <div class="why-choose-counter">
                            <h3><span class="counter">800</span>+</h3>
                            <p>project complated</p>
                        </div>
                    </div>
                    <!-- Why Choose Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Why Choose Image Start -->
                    <div class="why-choose-image">
                        <figure class="image-anime reveal">
                            <img src="images/why-choose-img-3.jpg" alt="">
                        </figure>
                    </div>
                    <!-- Why Choose Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

    <!-- Our Projects Section Start -->
    <div class="our-projects">
        <div class="light-bg-section">
            <div class="container-fluid">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">our projects</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Explore our diverse range of projects</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction services, including residential, commercial, and industrial projects.</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!-- Project Item Start -->
                        <div class="project-item wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Project Image Start -->
                            <div class="project-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="images/our-project-1.jpg" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Project Image End -->

                            <!-- Project Body Start -->
                            <div class="project-body">
                                <!-- Project Body Title Start -->
                                <div class="project-body-title">
                                    <h3>aspen heights</h3>
                                </div>
                                <!-- Project Body Title End -->

                                <!-- Project Content Start -->
                                <div class="project-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="project-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Project Content End -->
                            </div>
                            <!-- Project Body End -->
                        </div>
                        <!-- Project Item End -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Project Item Start -->
                        <div class="project-item wow fadeInUp" data-wow-delay="0.5s">
                            <!-- Project Image Start -->
                            <div class="project-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="images/our-project-2.jpg" alt="">
                                    </figure>
                                </a>
                            </div>

                            <!-- Project Image End -->

                            <!-- Project Body Start -->
                            <div class="project-body">
                                <!-- Project Body Title Start -->
                                <div class="project-body-title">
                                    <h3>forest hill towers</h3>
                                </div>
                                <!-- Project Body Title End -->

                                <!-- Project Content Start -->
                                <div class="project-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="project-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Project Content End -->
                            </div>
                            <!-- Project Body End -->
                        </div>
                        <!-- Project Item End -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Project Item Start -->
                        <div class="project-item wow fadeInUp" data-wow-delay="0.75s">
                            <!-- Project Image Start -->
                            <div class="project-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="images/our-project-3.jpg" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Project Image End -->

                            <!-- Project Body Start -->
                            <div class="project-body">
                                <!-- Project Body Title Start -->
                                <div class="project-body-title">
                                    <h3>bayside residences</h3>
                                </div>
                                <!-- Project Body Title End -->

                                <!-- Project Content Start -->
                                <div class="project-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="project-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Project Content End -->
                            </div>
                            <!-- Project Body End -->
                        </div>
                        <!-- Project Item End -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Project Item Start -->
                        <div class="project-item wow fadeInUp" data-wow-delay="1s">
                            <!-- Project Image Start -->
                            <div class="project-image" data-cursor-text="View">
                                <a href="#">
                                    <figure>
                                        <img src="images/our-project-4.jpg" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Project Image End -->

                            <!-- Project Body Start -->
                            <div class="project-body">
                                <!-- Project Body Title Start -->
                                <div class="project-body-title">
                                    <h3>parkview plaza</h3>
                                </div>
                                <!-- Project Body Title End -->

                                <!-- Project Content Start -->
                                <div class="project-content">
                                    <p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
                                    <div class="project-content-footer">
                                        <a href="#" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Project Content End -->
                            </div>
                            <!-- Project Body End -->
                        </div>
                        <!-- Project Item End -->
                    </div>

                    <!-- Services Footer Btn Start -->
                    <div class="project-footer-btn wow fadeInUp" data-wow-delay="1.25s">
                        <a href="#" class="btn-default">view all projects</a>
                    </div>
                    <!-- Services Footer Btn End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Projects Section End -->

    <!-- Cta Box Section Start -->
    <div class="cta-box">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Let's bulid something great together!</h2>
                        <p class="wow fadeInUp">Don't wait any longer to bring your construction dreams to life. Partner with jassa and experience unparalleled service and quality.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Section Btn Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                        <a href="#" class="btn-default btn-large">get free quote</a>
                    </div>
                    <!-- Section Btn End -->
                </div>

                <div class="col-lg-5 col-md-4">
                    <!-- Cta Box Image Start -->
                    <div class="cta-box-image">
                        <figure>
                            <img src="images/cta-box-img.png" alt="">
                        </figure>
                    </div>
                    <!-- Cta Box Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Cta Box Section End -->

    <!-- Our Testiminial Start -->
    <div class="our-testimonial">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">testimonials</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">What people are saying about us</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction services, including residential, commercial, and industrial projects.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Testimonial Slider Start -->
                    <div class="testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>The project was successfully completed within the agreed timeframe, meeting all our expectations. A team of skilled and experienced technical staff, along with the required equipment and facilities, was employed for the task. The project period spanned from 2021-22 to 2022-23 for Kanwal Duroparts Pvt. Ltd.</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-1.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>HUHA</h3>
                                                <p>Industrial</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>JassaConstructions surpassed our expectations by completing the project on schedule. Their construction quality is excellent, technical expertise is top-notch, and their team's professionalism is commendable. We wish them continued success in their future endeavors.</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-2.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>HUHA  Enterprises</h3>
                                                <p>Industrial</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>JassaConstructions exceeded our expectations by completing their work on time. The quality of constructions is good, technical proficiency is best and experienced general behavior was good. We wish them every success in their future projects.</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-3.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>HUHA healthcare</h3>
                                                <p>Industrial</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->

                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="testimonial-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>JassaConstructions surpassed our expectations by completing the project on schedule. Their construction quality is excellent, technical expertise is top-notch, and their team's professionalism is commendable. We wish them continued success in their future endeavors.</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-4.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>HUHA</h3>
                                                <p>Industrial</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- Testimonial Slider End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Testiminial End -->

    <!-- Our FAQs Section Start -->
    <div class="our-faqs">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">faqs</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Got questions? we've got answers</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction services, including residential, commercial, and industrial projects.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-5">
                    <!-- Our FAQs Images Start -->
                    <div class="our-faqs-images">
                        <div class="row align-items-end">
                            <div class="col-md-6 col-6">
                                <!-- FAQs Img Start -->
                                <div class="faqs-img-1">
                                    <figure class="image-anime reveal">
                                        <img src="images/our-faqs-img-1.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- FAQs Img End -->
                            </div>
                            <div class="col-md-6 col-6">
                                <!-- FAQs Img Start -->
                                <div class="faqs-img-2">
                                    <figure class="image-anime reveal">
                                        <img src="images/our-faqs-img-2.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- FAQs Img End -->
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="col-md-6 col-6">
                                <!-- FAQs Img Start -->
                                <div class="faqs-img-1">
                                    <figure class="image-anime reveal">
                                        <img src="images/our-faqs-img-3.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- FAQs Img End -->
                            </div>
                            <div class="col-md-6 col-6">
                                <!-- FAQs Img Start -->
                                <div class="faqs-img-2">
                                    <figure class="image-anime reveal">
                                        <img src="images/our-faqs-img-4.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- FAQs Img End -->
                            </div>
                        </div>

                        <div class="our-faqs-bulitup">
                            <img src="images/icon-faq-bulitup.svg" alt="">
                        </div>
                    </div>
                    <!-- Our FAQs Images End -->
                </div>

                <div class="col-lg-7">
                    <!-- FAQ Accordion Start -->
					<div class="faq-accordion" id="accordion">
						<!-- FAQ Item Start -->
						<div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
							<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Do you offer a free, no obligation quotation?
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
								data-bs-parent="#accordion">
								<div class="accordion-body">
									<p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
								</div>
							</div>
						</div>
						<!-- FAQ Item End -->

						<!-- FAQ Item Start -->
						<div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
							<h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									What services do you offer?
								</button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
								data-bs-parent="#accordion">
								<div class="accordion-body">
									<p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
								</div>
							</div>
						</div>
						<!-- FAQ Item End -->

						<!-- FAQ Item Start -->
						<div class="accordion-item wow fadeInUp" data-wow-delay="0.75s">
							<h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									What types of projects do you specialize in?
								</button>
							</h2>
							<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
								data-bs-parent="#accordion">
								<div class="accordion-body">
									<p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
								</div>
							</div>
						</div>
						<!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
						<div class="accordion-item wow fadeInUp" data-wow-delay="1s">
                            <h2 class="accordion-header" id="headingfour">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
									How do I start a project with your company?
								</button>
							</h2>
							<div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
								data-bs-parent="#accordion">
								<div class="accordion-body">
									<p>Our post-construction services gives you peace of mind knowing that we are still here for you even after.</p>
								</div>
							</div>
						</div>
						<!-- FAQ Item End -->
					</div>
					<!-- FAQ Accordion End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our FAQs Section End -->

    <!-- Our Blog Section End -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">news & blog</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Articles & blog posts</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction services, including residential, commercial, and industrial projects.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="#" class="image-anime">
                                    <img src="images/post-1.jpg" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Content Start -->
                        <div class="post-item-content">
                            <!-- post Item Body Start -->
                            <div class="post-item-body">
                                <h2><a href="#">10 Essential Tips for Choosing the Right Builder</a></h2>
                            </div>
                            <!-- Post Item Body End-->

                            <!-- Post Item Footer Start-->
                            <div class="post-item-footer">
                                <a href="#" class="readmore-btn">read more</a>
                            </div>
                            <!-- Post Item Footer End-->
                        </div>
                        <!-- post Item Content End -->
                    </div>
                    <!-- Blog Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="#" class="image-anime">
                                    <img src="images/post-2.jpg" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Content Start -->
                        <div class="post-item-content">
                            <!-- post Item Body Start -->
                            <div class="post-item-body">
                                <h2><a href="#">The Future of Sustainable Construction Innovations</a></h2>
                            </div>
                            <!-- Post Item Body End-->

                            <!-- Post Item Footer Start-->
                            <div class="post-item-footer">
                                <a href="#" class="readmore-btn">read more</a>
                            </div>
                            <!-- Post Item Footer End-->
                        </div>
                        <!-- post Item Content End -->
                    </div>
                    <!-- Blog Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="#" class="image-anime">
                                    <img src="images/post-3.jpg" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Content Start -->
                        <div class="post-item-content">
                            <!-- post Item Body Start -->
                            <div class="post-item-body">
                                <h2><a href="#">How to Design Your Dream Home: A Step-by-Step Guide</a></h2>
                            </div>
                            <!-- Post Item Body End-->

                            <!-- Post Item Footer Start-->
                            <div class="post-item-footer">
                                <a href="#" class="readmore-btn">read more</a>
                            </div>
                            <!-- Post Item Footer End-->
                        </div>
                        <!-- post Item Content End -->
                    </div>
                    <!-- Blog Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Blog End -->

    <!-- Contact Us Section Start -->
    <div class="contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">
                    <!-- Contact Sidebar Start -->
                    <div class="contact-sidebar wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Contact Info Start -->
                        <div class="contact-info">
                            <div class="icon-box">
                                <img src="images/icon-phone.svg" alt="">
                            </div>
                            <div class="contact-info-content">
                                <p>call support center 24/7</p>
                                <h3>+0123456789</h3>
                            </div>
                        </div>
                        <!-- Contact Info End -->

                        <!-- Contact Info Start -->
                        <div class="contact-info">
                            <div class="icon-box">
                                <img src="images/icon-mail.svg" alt="">
                            </div>
                            <div class="contact-info-content">
                                <p>write to us</p>
                                <h3>demo<br>@yahoo.co.in</h3>
                            </div>
                        </div>
                        <!-- Contact Info End -->

                        <!-- Contact Info Image Start -->
                        <div class="contact-info-image">
                            <figure>
                                <img src="images/contact-info-img.png" alt="">
                            </figure>
                        </div>
                        <!-- Contact Info Image End -->
                    </div>
                    <!-- Contact Sidebar End -->
                </div>

                <div class="col-lg-8 col-md-7">
                    <!-- Contact Form start -->
                    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">contact us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Get in touch with us</h2>
                        </div>
                        <!-- Section Title End -->

                        <form id="contactForm" action="#" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your name" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your email" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="website" class="form-control" id="website" placeholder="Subject" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="msg" class="form-control" id="msg" rows="3" placeholder="Message" required=""></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">submit</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Section End -->

    {{-- Footer --}}
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
