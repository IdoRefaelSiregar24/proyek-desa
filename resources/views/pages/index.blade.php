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
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                            </h3>
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Pembangunan & Monitoring Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Deskripsi Pembangunan & Monitoring Proyek</p>
                        </div>
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default">
                                <i class="fa-solid fa-rocket me-2"></i> Tentang
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
                                <a href="#" class="btn-default">Pengaduan</a>
                            </div>
                            <div class="about-contact-support">
                                <div class="icon-box">
                                    <img src="{{ asset('assets-guest/images/icon-phone.svg') }}" alt="">
                                </div>
                                <div class="about-support-content">
                                    <p>Hubungi Kami 24X7</p>
                                    <h3>+082211411365</h3>
                                </div>
                            </div>
                        </div>
                        <!-- About Content Footer End -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center mt-5 g-4">

            <div class="col-md-3">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
            <i class="fa-solid fa-folder-open fa-2x text-primary mb-2"></i>
            <h2 class="fw-bold counter" data-target="{{ $totalProyek }}">0</h2>
            <p class="text-muted mb-0">Total Proyek</p>
        </div>
    </div>
</div>
@include('layouts.guest.totalProyekJS')
            <!-- Total Anggaran -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-wallet fa-2x text-success mb-2"></i>
                        <h2 class="fw-bold">
                            Rp {{ number_format($totalAnggaran, 0, ',', '.') }}
                        </h2>
                        <p class="text-muted mb-0">Total Anggaran</p>
                    </div>
                </div>
            </div>

            <!-- Rata-rata Anggaran -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-chart-line fa-2x text-warning mb-2"></i>
                        <h2 class="fw-bold">
                            Rp {{ number_format($rataAnggaran, 0, ',', '.') }}
                        </h2>
                        <p class="text-muted mb-0">Rata-rata Anggaran</p>
                    </div>
                </div>
            </div>

            <!-- Proyek Terbesar -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="fa-solid fa-star fa-2x text-danger mb-2"></i>
                        <h2 class="fw-bold">
                            Rp {{ number_format($anggaranMax, 0, ',', '.') }}
                        </h2>
                        <p class="text-muted mb-0">Proyek Terbesar</p>
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
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Mari Bangun Kemajuan Desa Bersama!</h2>
                        <p class="wow fadeInUp">Mari berkolaborasi untuk mewujudkan proyek desa yang membawa manfaat bagi
                            masyarakat. Bersama, kita ciptakan perubahan nyata!</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Section Btn Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                        <a href="#" class="btn-default btn-large">Lihat Proyek</a>
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

    <!-- Start Project Slideshow Section -->
    <section class="project-slideshow py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12 text-center">
                    <h2 class="text-anime-style-3">Mari Bangun Kemajuan Bersama</h2>
                    <p>Beberapa proyek desa yang sedang berjalan dan progresnya</p>
                </div>
            </div>

            <div class="swiper projectSwiper">
                <div class="swiper-wrapper">
                    @forelse ($dataProyek as $proyek)
                        @php
                            $thumbnail = $thumbnails[$proyek->proyek_id] ?? null;
                            $imagePath =
                                $thumbnail && $thumbnail->file_name
                                    ? asset('storage/' . $thumbnail->file_name)
                                    : asset('images/placeholder.jpg');
                        @endphp

                        <div class="swiper-slide">
                            <div class="card project-card h-100 shadow-sm border-0 text-center">
                                <a href="{{ route('detail-proyek', $proyek->proyek_id) }}">
                                    <img src="{{ $imagePath }}" alt="{{ $proyek->nama_proyek }}"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $proyek->nama_proyek }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($proyek->deskripsi, 80) }}</p>
                                    <a href="{{ route('detail-proyek', $proyek->proyek_id) }}" class="btn btn-red">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="swiper-slide text-center">
                            <p>Belum ada proyek yang tersedia</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination & Navigation -->
                <div class="swiper-pagination mt-3"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Swiper JS & CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".projectSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
            }
        });
    </script>

    <!-- Custom CSS -->
    <style>
        .project-card img {
            transition: transform 0.3s;
        }

        .project-card img:hover {
            transform: scale(1.05);
        }

        .btn-red {
            background-color: #d80000;
            color: #fff;
            border: none;
            padding: 0.45rem 0.9rem;
            border-radius: 0.35rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-red:hover {
            background-color: #FFB703;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
    <!-- End Project Slideshow Section -->


    <!-- Our Testiminial Start -->
    <div class="our-testimonial">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Testimoni</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Apa Kata Mereka Tentang Proyek Desa</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">
                            Kami memantau berbagai proyek desa mulai dari pembangunan infrastruktur, fasilitas umum, hingga
                            program pemberdayaan warga.
                            Berikut pengalaman dan masukan dari warga serta pihak terkait.
                        </p>
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

                                <!-- Testimonial Slide 1 -->
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
                                                <p>
                                                    Proyek pembangunan jalan desa selesai tepat waktu dan memudahkan
                                                    mobilitas warga.
                                                    Tim pelaksana selalu melaporkan progres secara transparan sehingga kami
                                                    bisa memantau setiap tahapannya.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-1.jpg" alt="Warga Desa">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Bapak Ahmad</h3>
                                                <p>Warga Desa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial Slide 2 -->
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
                                                <p>
                                                    Dengan sistem pemantauan ini, kami dapat mengecek progres proyek
                                                    pembangunan sarana air bersih.
                                                    Laporan rutin membuat perencanaan kegiatan desa lebih terarah.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-2.jpg" alt="Kepala Desa">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Ibu Siti</h3>
                                                <p>Kepala Desa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial Slide 3 -->
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
                                                <p>
                                                    Aplikasi pemantauan proyek desa ini sangat membantu tim teknis kami
                                                    untuk memastikan semua pekerjaan sesuai target.
                                                    Transparansi progres juga meningkatkan kepercayaan warga.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-3.jpg" alt="Tim Teknis">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Pak Budi</h3>
                                                <p>Tim Teknis Proyek</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial Slide 4 -->
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
                                                <p>
                                                    Laporan progres proyek melalui aplikasi ini membuat kami sebagai warga
                                                    lebih aktif memberi masukan.
                                                    Setiap pekerjaan dapat dipantau secara real-time dan tepat sasaran.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <div class="author-image">
                                                <figure class="image-anime">
                                                    <img src="images/author-4.jpg" alt="Warga Desa">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3>Bu Ani</h3>
                                                <p>Warga Desa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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


@endsection
