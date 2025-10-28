@extends('layouts.guest.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Tambahkan Proyek Desa</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Tambahkan Proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Proyek Form start -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
        <!-- Section Title Start -->
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Tambahkan Proyek Desa</h2>
        </div>
        <!-- Section Title End -->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('proyek-guest.store') }}" method="POST" validate>
            @csrf
            <div class="row">
                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="kode_proyek" class="form-control" id="kode_proyek" placeholder="Kode Proyek"
                        value="{{ old('kode_proyek') }}" required>
                    @error('kode_proyek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="nama_proyek" class="form-control" id="nama_proyek" placeholder="Nama Proyek"
                        value="{{ old('nama_proyek') }}" required>
                    @error('nama_proyek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Tahun"
                        value="{{ old('tahun') }}" required>
                    @error('tahun')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi"
                        value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="anggaran" class="form-control" id="anggaran" placeholder="Anggaran"
                        value="{{ old('anggaran') }}" required>
                    @error('anggaran')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="sumber_dana" class="form-control" id="sumber_dana" placeholder="Sumber Dana"
                        value="{{ old('sumber_dana') }}" required>
                    @error('sumber_dana')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="progress" class="form-control" id="progress" placeholder="Progress (%)"
                        value="{{ old('progress') }}" required>
                    @error('progress')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-5">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn-default">
                        <i class="fa-solid fa-plus me-2"></i> Tambah Proyek
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Form Section -->
@endsection
