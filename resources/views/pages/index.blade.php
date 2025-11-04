@extends('layouts.guest.app')

@section('content')
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <div class="section-title">
                            <h3 class="wow fadeInUp">
                                {{-- Jika user sudah login --}}
                                @auth
                                    <h3 class="wow fadeInUp">Selamat Datang, {{ Auth::user()->name }}</h3>
                                @endauth
                                @guest
                                @endguest
                            </h3>
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Pembangunan & Monitoring Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Deskripsi Pembangunan & Monitoring Proyek</p>
                        </div>
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default">
                                <i class="fa-solid fa-rocket me-2"></i> Get Started
                            </a>
                            <a href="{{ route('proyek-guest.index') }}" class="btn-default">
                                <i class="fa-solid fa-folder-open me-2"></i> Lihat Proyek
                            </a>
                        </div>
                    </div>
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
                            <h3 class="wow fadeInUp">Selamat datang di</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque"> Dashboard Proyek Desa Balam Sempurna</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Halaman ini dirancang untuk memudahkan
                                pengelolaan, pemantauan, dan pelaporan berbagai proyek pembangunan desa secara transparan
                                dan efisien.
                                <br>
                                Melalui sistem ini, kami berkomitmen untuk:
                            </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Content Body Start -->
                        <div class="about-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <ul>
                                <li>Meningkatkan efisiensi dalam penginputan dan pembaruan data proyek</li>
                                <li>Menyediakan informasi real-time terkait perkembangan dan progres pembangunan</li>
                                <li>Mendorong transparansi dan akuntabilitas dalam penggunaan anggaran serta pelaksanaan
                                    kegiatan</li>
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

    <!-- Cta Box Section Start -->
    <div class="cta-box">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Let's bulid something great together!</h2>
                        <p class="wow fadeInUp">Don't wait any longer to bring your construction dreams to life. Partner
                            with jassa and experience unparalleled service and quality.</p>
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
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction
                            services, including residential, commercial, and industrial projects.</p>
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
                                                <p>The project was successfully completed within the agreed timeframe,
                                                    meeting all our expectations. A team of skilled and experienced
                                                    technical staff, along with the required equipment and facilities, was
                                                    employed for the task. The project period spanned from 2021-22 to
                                                    2022-23 for Kanwal Duroparts Pvt. Ltd.</p>
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
                                                <p>JassaConstructions surpassed our expectations by completing the project
                                                    on schedule. Their construction quality is excellent, technical
                                                    expertise is top-notch, and their team's professionalism is commendable.
                                                    We wish them continued success in their future endeavors.</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-2.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>HUHA Enterprises</h3>
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
                                                <p>JassaConstructions exceeded our expectations by completing their work on
                                                    time. The quality of constructions is good, technical proficiency is
                                                    best and experienced general behavior was good. We wish them every
                                                    success in their future projects.</p>
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
                                                <p>JassaConstructions surpassed our expectations by completing the project
                                                    on schedule. Their construction quality is excellent, technical
                                                    expertise is top-notch, and their team's professionalism is commendable.
                                                    We wish them continued success in their future endeavors.</p>
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

    <!-- Our Blog Section End -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">news & blog</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Articles & blog posts</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We specialize in a wide range of construction
                            services, including residential, commercial, and industrial projects.</p>
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
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Your name" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Your email" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Phone number" required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="website" class="form-control" id="website"
                                        placeholder="Subject" required="">
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
@endsection
