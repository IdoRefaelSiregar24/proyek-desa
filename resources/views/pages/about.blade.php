@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section Start -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content text-center">
                        <div class="section-title">
                            @auth
                                <h3 class="wow fadeInUp">Selamat Datang, {{ Auth::user()->name }}</h3>
                            @endauth

                            <h1 class="text-anime-style-3" data-cursor="-opaque">Tentang Web Progress Proyek Desa</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Platform transparansi pembangunan dan pemantauan proyek desa berbasis digital.
                            </p>
                        </div>
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <a href="{{ route('proyek-guest.index') }}" class="btn-default d-inline-flex align-items-center gap-2">
                                <i data-feather="folder-open"></i> Lihat Proyek
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <img src="{{ asset('images/about-desa.jpg') }}" alt="Proyek Desa" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Mengenal Web Progress Proyek Desa</h2>
                    <p class="mb-3">
                        Website ini dikembangkan untuk mendukung transparansi dan akuntabilitas dalam pembangunan desa.
                        Melalui platform ini, masyarakat dapat memantau progres setiap proyek yang sedang berjalan —
                        mulai dari tahap perencanaan, pelaksanaan, hingga evaluasi akhir.
                    </p>
                    <p class="mb-3">
                        Fitur utama meliputi pemantauan status proyek, informasi dana, galeri foto pembangunan, serta laporan kemajuan yang dapat diakses publik secara real-time.
                    </p>
                    <p>
                        Tujuan utama kami adalah menciptakan sistem digital yang membantu pemerintah desa dan warga untuk berkolaborasi
                        dalam membangun desa yang lebih maju, transparan, dan berkelanjutan.
                    </p>
                    <a href="{{ route('proyek-guest.index') }}" class="btn btn-success d-inline-flex align-items-center gap-2 mt-3">
                        <i data-feather="activity"></i> Lihat Proyek Berjalan
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Feather Icons Script -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
@endsection
