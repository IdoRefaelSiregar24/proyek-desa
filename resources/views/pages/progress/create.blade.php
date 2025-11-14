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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Tambahkan Progress Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Tambahkan Data Progress</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Progress Form start -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
        <!-- Section Title Start -->
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Tambah Progress Proyek</h2>
        </div>
        <!-- Section Title End -->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('progress-guest.store') }}" method="POST" validate>
            @csrf
            <div class="row">

                <!-- PROYEK -->
                <div class="form-group col-md-12 mb-4">
                    <select name="proyek_id" class="form-control" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach($proyek as $p)
                            <option value="{{ $p->proyek_id }}">{{ $p->nama_proyek }}</option>
                        @endforeach
                    </select>
                    @error('proyek_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TAHAP -->
                <div class="form-group col-md-12 mb-4">
                    <select name="tahap_id" class="form-control" required>
                        <option value="">-- Pilih Tahap Proyek --</option>
                        @foreach($tahapan as $t)
                            <option value="{{ $t->tahap_id }}">
                                {{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)
                            </option>
                        @endforeach
                    </select>
                    @error('tahap_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PERSEN REAL -->
                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="persen_real" class="form-control" placeholder="Persentase Real (%)"
                        value="{{ old('persen_real') }}" min="0" max="100" step="0.01" required>
                    @error('persen_real')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TANGGAL -->
                <div class="form-group col-md-6 mb-4">
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CATATAN -->
                <div class="form-group col-md-12 mb-5">
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan Progress (opsional)">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="col-md-12">
                    <button type="submit" class="btn-default">
                        <i class="fa-solid fa-plus me-2"></i> Tambah Progress
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Form Section -->
@endsection
