<!-- Footer Start -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!-- About Footer Start -->
                <div class="about-footer">
                    <!-- Footer Logo Start -->
                    <div class="footer-logo">
                        <figure>
                            <img src="{{ asset('/images/logoHorizontal.svg') }}" style="width: 500px" alt="Logo">
                        </figure>
                    </div>
                    <!-- Footer Logo End -->

                    <!-- Footer Content Start -->
                    <div class="footer-content">
                        <p>Sistem Pembangunan & Monitoring Proyek yang dirancang untuk mempermudah pengelolaan,
                            pencatatan, dan pemantauan aktivitas proyek secara lebih efisien dan terstruktur.
                        </p>
                    </div>
                    <!-- Footer Content End -->
                </div>
                <!-- About Footer End -->
            </div>

            <!-- Footer Menu Start -->
            <div class="col-lg-3 col-md-3 col-12">
                <div class="footer-links">
                    <h3>Menu Utama</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li><a href="{{ route('proyek-guest.index') }}">Proyek</a></li>
                        @auth
                            @if (auth()->user()->role === 'super_admin')
                                <li><a href="{{ route('users.index') }}">Manajemen Data User & Warga</a></li>
                            @endif
                        @endauth
                        <li><a href="{{ route('kontraktor.index') }}">Kontraktor</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-12">
                <div class="footer-links">
                    <h3>Perusahaan & Layanan</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('developer') }}">Profil Pengembang</a></li>
                        <li><a href="{{ route('services') }}">Layanan</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <!-- Footer Menu End -->


            <div class="col-lg-3 col-md-4 col-12">
                <!-- Footer Contact Info Box Start -->
                <div class="footer-links footer-contact-box">
                    <h3>Hubungi Kami</h3>

                    <div class="footer-info-box">
                        <div class="icon-box">
                            <img src="images/icon-phone.svg" alt="">
                        </div>
                        <p>+62 822 1141 1365</p>
                    </div>

                    <div class="footer-info-box">
                        <div class="icon-box">
                            <img src="images/icon-mail.svg" alt="">
                        </div>
                        <p>ido24si@mahasiswa.pcr.ac.id</p>
                    </div>

                    <div class="footer-info-box">
                        <div class="icon-box">
                            <img src="images/icon-location.svg" alt="">
                        </div>
                        <p>Pekanbaru, Indonesia</p>
                    </div>

                </div>
                <!-- Footer Contact Info Box End -->
            </div>
        </div>

        <!-- Footer Copyright Section Start -->
        <div class="footer-copyright">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="footer-copyright-text">
                        <p>
                            <img src="images/icon-copyright.svg" alt="" style="width:16px; margin-right:6px;">
                            2024 Sistem Informasi Desa — All Rights Reserved.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5">
                    <div class="footer-social-links">
                        <ul>
                            <li><a href="https://www.instagram.com/ido_refsiregar?igsh=dWQwYWhvZzlyMThy"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="https://github.com/IdoRefaelSiregar24"><i class="fa-brands fa-github"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/in/ido-refael-siregar-b27920367"><i
                                        class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="mailto:ido24si@mahasiswa.pcr.ac.id"><i
                                        class="fa-solid fa-envelope fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copyright Section End -->
    </div>
</footer>
<!-- Footer End -->
