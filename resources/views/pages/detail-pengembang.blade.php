@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title text-center">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Profil Pengembang</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Identitas lengkap pengembang sistem Pembangunan &
                                Monitoring Proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Developer Section -->
    <div class="about-us py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Foto Developer -->
                <div class="col-lg-5">
                    <div class="about-image text-center">
                        <div class="about-img">
                            <figure class="reveal">
                                <img src="{{ asset('images/developer/developer.svg') }}" alt="Foto Pengembang"
                                    class="rounded-4 shadow-lg" style="border-radius: 60px;">
                            </figure>
                        </div>
                    </div>
                </div>

                <!-- Detail Developer -->
                <div class="col-lg-7">
                    <div class="about-content">

                        <div class="section-title">
                            <h3 class="wow fadeInUp">Pengembang Sistem</h3>
                            <h2 class="text-anime-style-3">Ido Refael Siregar</h2>

                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Seorang pengembang web dan analis sistem yang fokus pada pembangunan aplikasi
                                berbasis web untuk mendukung transparansi, manajemen proyek, dan digitalisasi layanan
                                masyarakat.
                            </p>
                        </div>

                        <div class="about-content-body wow fadeInUp" data-wow-delay="0.35s">
                            <ul class="list-unstyled">
                                <li><strong>NIM:</strong> 2457301067</li>
                                <li><strong>Program Studi:</strong> D4 Sistem Informasi</li>
                                <li><strong>Institusi:</strong> Politeknik Caltex Riau</li>
                            </ul>
                        </div>

                        <!-- Sosial Media Icons -->
                        <div class="about-content-footer wow fadeInUp" data-wow-delay="0.5s">
                            <h5 class="mb-3">Terhubung dengan saya :  </h5>

                            <div class="d-flex align-items-center gap-3">

                                <!-- LinkedIn -->
                                <a href="https://www.linkedin.com/in/ido-refael-siregar-b27920367" target="_blank" class="social-icon">
                                    <i class="fa-brands fa-linkedin fa-2x"></i>
                                </a>

                                <!-- GitHub -->
                                <a href="https://github.com/IdoRefaelSiregar24" target="_blank" class="social-icon">
                                    <i class="fa-brands fa-github fa-2x"></i>
                                </a>

                                <!-- Instagram -->
                                <a href="https://www.instagram.com/ido_refsiregar?igsh=dWQwYWhvZzlyMThy" target="_blank" class="social-icon">
                                    <i class="fa-brands fa-instagram fa-2x"></i>
                                </a>

                                <!-- Email -->
                                <a href="mailto:ido24si@mahasiswa.pcr.ac.id" class="social-icon">
                                    <i class="fa-solid fa-envelope fa-2x"></i>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Card Tambahan: Skill -->
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="text-anime-style-3">Keahlian Utama</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="testimonial-item p-4 text-center">
                            <i class="fa-solid fa-code fa-2x mb-3"></i>
                            <h4>Web Development</h4>
                            <p>Membangun aplikasi modern menggunakan Laravel, CI4, Tailwind, dan API Based System.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="testimonial-item p-4 text-center">
                            <i class="fa-solid fa-database fa-2x mb-3"></i>
                            <h4>Database Design</h4>
                            <p>Berpengalaman membuat ERD, relasi, dan manajemen database MySQL/PostgreSQL.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="testimonial-item p-4 text-center">
                            <i class="fa-solid fa-pen-ruler fa-2x mb-3"></i>
                            <h4>System Analyst</h4>
                            <p>Analisis proses bisnis, workflow, hingga perancangan sistem digital desa & UMKM.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
