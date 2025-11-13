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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Tambahkan Tahapan Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Proyek: <strong>{{ $proyek->nama_proyek }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Tahapan Form start -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
        <!-- Section Title Start -->
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">
                Tambahkan Tahapan untuk Proyek : {{ $proyek->nama_proyek }}
            </h2>
        </div>
        <!-- Section Title End -->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('tahapan-guest.store', $proyek->proyek_id) }}" method="POST">
            @csrf
            <input type="hidden" name="proyek_id" value="{{ $proyek->proyek_id }}">

            <div class="row">
                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="nama_tahap" class="form-control" placeholder="Nama Tahapan"
                        value="{{ old('nama_tahap') }}" required>
                    @error('nama_tahap')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3 mb-4">
                    <input type="number" step="0.01" name="target_persen" class="form-control"
                        placeholder="Target (%)" value="{{ old('target_persen') }}" required>
                    @error('target_persen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control" value="{{ old('tgl_mulai') }}" required>
                    @error('tgl_mulai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control" value="{{ old('tgl_selesai') }}" required>
                    @error('tgl_selesai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn-default">
                        <i class="fa-solid fa-plus me-2"></i> Tambah Tahapan
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Form Section -->
@endsection
