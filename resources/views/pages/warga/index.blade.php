@extends('layouts.guest.app')

@section('content')
    <!-- Start Hero Section -->
    <section class="hero bg-section parallaxie position-relative d-flex align-items-center justify-content-center"
        style="min-height: 90vh;">
        <!-- Overlay Gelap -->
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>

        <!-- Kontainer Utama -->
        <div class="container position-relative text-center text-white py-5">
            <h1 class="fw-bold text-white display-5 mb-3">Profil Warga</h1>
            <p class="lead mb-5 text-light">Informasi data diri warga Desa Balam Sempurna</p>

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 col-12">
                    <div class="card shadow-lg border-0 rounded-4 bg-white text-dark">
                        <div class="card-body bg-white p-5">
                            @auth
                                @php
                                    $warga = $warga ?? null;
                                @endphp

                                <div class="text-center mb-4">
                                    <img src="{{ asset('assets-guest/images/avatar-default.png') }}" alt="User Avatar"
                                        class="rounded-circle shadow-sm mb-3 border border-3 border-success" width="110"
                                        height="110">
                                    <h5 class="fw-bold text-success mb-0">{{ Auth::user()->name }}</h5>
                                    <small class="text-muted d-block">{{ Auth::user()->email }}</small>
                                </div>

                                <hr class="mb-4">

                                <div class="row text-start">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">NIK</label>
                                        <input type="text" class="form-control"
                                            value="{{ $warga->no_ktp ?? 'Belum diisi' }}"readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Nama Lengkap</label>
                                        <input type="text" class="form-control"
                                            value="{{ $warga->nama ?? Auth::user()->name }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                                        <input type="text" class="form-control"
                                            value="{{ $warga->jenis_kelamin ?? 'Belum diisi' }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Agama</label>
                                        <input type="text" class="form-control" value="{{ $warga->agama ?? 'Belum diisi' }}"
                                            readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Pekerjaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $warga->pekerjaan ?? 'Belum diisi' }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Nomor Telepon</label>
                                        <input type="text" class="form-control" value="{{ $warga->telp ?? 'Belum diisi' }}"
                                            readonly>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="text" class="form-control"
                                            value="{{ $warga->email ?? Auth::user()->email }}" readonly>
                                    </div>
                                </div>

                                @php
                                    $dataLengkap =
                                        $warga &&
                                        $warga->no_ktp &&
                                        $warga->nama &&
                                        $warga->jenis_kelamin &&
                                        $warga->agama &&
                                        $warga->pekerjaan;
                                @endphp

                                <div class="text-center mt-4">
                                    @if (!$dataLengkap)
                                    
                                        <a href="{{ route('warga-guest.create') }}"
                                            class="btn btn-success fw-semibold px-4 py-2 d-inline-flex align-items-center gap-2">
                                            <i data-feather="user-plus"></i> Isi Data Diri
                                        </a>
                                    @else

                                        <a href="{{ route('warga-guest.edit', Auth::user()->id) }}"
                                            class="btn btn-outline-success fw-semibold px-4 py-2 d-inline-flex align-items-center gap-2">
                                            <i data-feather="edit-3"></i> Edit Profil
                                        </a>

                                        <form action="{{ route('auth.destroy') }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini? Data Anda akan hilang permanen.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-outline-danger fw-semibold px-4 py-2 d-inline-flex align-items-center gap-2">
                                                <i data-feather="trash-2"></i> Hapus Akun
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @else
                                <div class="alert alert-warning text-center">
                                    Anda belum login.
                                    <a href="{{ route('login') }}" class="fw-bold text-success text-decoration-none">Login di
                                        sini</a>
                                </div>
                            @endauth
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
