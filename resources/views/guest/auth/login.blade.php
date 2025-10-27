@extends('guest.layouts.app')

@section('content')
{{-- Start content --}}
<div class="hero bg-section parallaxie position-relative d-flex align-items-center justify-content-center"
    style="min-height: 100vh;">
    <!-- Overlay -->
    <div class="overlay-dark"></div>

    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-12">
                <div class="login-card text-center wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('assets-guest/images/165x47 logo.svg') }}" alt="Logo" class="mb-3" height="45">

                    <h3 class="fw-bold text-white">Login Akun</h3>
                    <p class="text-light mb-4">Masuk untuk memantau dan mengelola proyek desa</p>

                    {{-- ✅ Pesan error dari controller (withErrors) --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- ✅ Pesan sukses jika ada --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') }}" placeholder="Masukkan Email" required>
                        </div>

                        <div class="mb-4 text-start">
                            <label for="password" class="form-label text-light">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan password" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 py-2">Masuk</button>

                        <div class="text-center mt-3 text-light">
                            Belum punya akun?
                            <a href="{{ route('register.show') }}" class="text-warning text-decoration-none">Daftar
                                Sekarang</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End content --}}
@endsection
