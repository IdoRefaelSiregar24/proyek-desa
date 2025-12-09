@extends('layouts.guest.app')

@section('content')
<!-- Hero Section Start -->
    <div class="hero bg-section parallaxie position-relative d-flex align-items-center justify-content-center"
        style="min-height: 100vh;">
        <!-- Overlay -->
        <div class="overlay-dark"></div>

        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 col-12">
                    <div class="login-card text-center wow fadeInUp p-4 rounded-4 shadow-lg bg-dark" data-wow-delay="0.3s"
                        style="max-width: 950px; margin: auto;">
                        <img src="{{ asset('/images/logoVertikal.svg') }}" alt="Logo" class="mb-3" height="200">

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
                                <label for="name" class="form-label text-light">Nama Lengkap</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label text-light">Alamat Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Masukkan Email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label text-light">Kata Sandi</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Konfirmasi Password --}}
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label text-light">Konfirmasi Kata Sandi</label>
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
@endsection
