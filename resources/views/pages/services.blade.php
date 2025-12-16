@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title text-center">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Layanan Sistem</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Contoh layanan yang tersedia dalam sistem Pembangunan & Monitoring Proyek
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="about-us py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="text-anime-style-3">Layanan Utama</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">Berikut adalah layanan dummy yang ditampilkan sebagai contoh.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="testimonial-item p-4 text-center">
                        <i class="fa-solid fa-file-invoice fa-2x mb-3"></i>
                        <h4>Pendaftaran Proyek</h4>
                        <p>Layanan untuk mendaftarkan proyek baru beserta informasi anggaran dan lokasi proyek.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="testimonial-item p-4 text-center">
                        <i class="fa-solid fa-map-location-dot fa-2x mb-3"></i>
                        <h4>Monitoring Lokasi</h4>
                        <p>Menampilkan lokasi proyek di peta, termasuk status pembangunan dan progres harian.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="testimonial-item p-4 text-center">
                        <i class="fa-solid fa-chart-line fa-2x mb-3"></i>
                        <h4>Laporan Statistik</h4>
                        <p>Menyediakan grafik penjualan, progres proyek, dan laporan bulanan secara visual.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="testimonial-item p-4 text-center">
                        <i class="fa-solid fa-users fa-2x mb-3"></i>
                        <h4>Manajemen Pengguna</h4>
                        <p>Layanan untuk mengatur hak akses pengguna dan role admin maupun user sistem.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="testimonial-item p-4 text-center">
                        <i class="fa-solid fa-file-export fa-2x mb-3"></i>
                        <h4>Ekspor Laporan</h4>
                        <p>Mendukung ekspor data proyek dan laporan dalam format PDF maupun Excel.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="testimonial-item p-4 text-center">
                        <i class="fa-solid fa-comment-dots fa-2x mb-3"></i>
                        <h4>Feedback & Review</h4>
                        <p>Pengguna dapat memberikan review atau masukan terkait layanan dan proyek yang sedang berjalan.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
