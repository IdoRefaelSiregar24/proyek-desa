@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title text-center">
                            <h1 class="text-anime-style-3 wow fadeInDown" data-cursor="-opaque">
                                Kontak & Lokasi Desa
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.3s">
                                Informasi resmi desa untuk mendukung transparansi dan pelayanan publik
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Desa -->
    <div class="about-us py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Detail Desa -->
                <div class="col-lg-6">
                    <div class="contact-info wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="section-title mb-4">
                            <h3 class="wow fadeInUp">Profil Desa</h3>
                            <h2 class="text-anime-style-3 wow fadeInUp" data-wow-delay="0.2s">
                                Desa Balam Sempurna
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.35s">
                                Desa Balam Sempurna merupakan desa yang aktif dalam pembangunan serta
                                penerapan sistem digital untuk monitoring dan transparansi proyek desa.
                            </p>
                        </div>

                        <div class="desa-info">
                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="text">
                                    Jl. Pembangunan No. 10, Kec. Contoh,<br>
                                    Kab. Contoh, Prov. Riau
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <div class="text">
                                    Kantor Desa Desa Balam Sempurna
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="text">
                                    (0761) 123456
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="text">
                                    Balamsempurna@desa.id
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div class="text">
                                    Senin – Jumat | 08.00 – 16.00 WIB
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Peta Lokasi -->
                <div class="col-lg-6">
                    <div class="map-area wow fadeInRight" data-wow-delay="0.4s">
                        <div class="section-title mb-3">
                            <h3 class="wow fadeInUp">Lokasi Kantor Desa</h3>
                        </div>

                        <div class="ratio ratio-16x9 shadow rounded-4 overflow-hidden wow zoomIn" data-wow-delay="0.6s">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220334.63358042645!2d100.4629954101375!3d1.750123971301388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d32b3103eedb91%3A0x3e7046139fb29d9a!2sBalam%20Sempurna%2C%20Bagan%20Sinembah%2C%20Rokan%20Hilir%20Regency%2C%20Riau!5e1!3m2!1sen!2sid!4v1765700077481!5m2!1sen!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>  
                </div>

            </div>
        </div>
    </div>

    <!-- Layanan Informasi -->
    <div class="services-section py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="text-anime-style-3 wow fadeInDown">
                            Layanan & Informasi Publik
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay="0.3s">
                            Saluran layanan resmi untuk masyarakat desa
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-icon">
                            <i class="fa-solid fa-file-circle-check"></i>
                        </div>
                        <h4>Administrasi Desa</h4>
                        <p>
                            Pelayanan administrasi kependudukan dan surat menyurat desa
                            secara cepat dan transparan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card wow fadeInUp" data-wow-delay="0.35s">
                        <div class="service-icon">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <h4>Pelayanan Masyarakat</h4>
                        <p>
                            Penyaluran aspirasi, pengaduan, dan komunikasi langsung
                            antara warga dan pemerintah desa.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h4>Monitoring Proyek</h4>
                        <p>
                            Informasi transparan terkait progres dan realisasi
                            pembangunan proyek desa.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
