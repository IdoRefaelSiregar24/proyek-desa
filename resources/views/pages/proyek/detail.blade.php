@extends('layouts.guest.app')

@section('content')

    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Detail Proyek Desa</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Informasi lengkap pembangunan & monitoring</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->


    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <!-- ========================= -->
        <!-- === DATA PROYEK ========= -->
        <!-- ========================= -->
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Detail Proyek</h2>
        </div>

        <div class="card p-4 mb-5 shadow-sm">
            <h4 class="mb-3 text-primary">Informasi Proyek</h4>
            <div class="row g-3">
                <div class="col-md-6"><strong>Kode Proyek:</strong> {{ $proyek->kode_proyek }}</div>
                <div class="col-md-6"><strong>Nama Proyek:</strong> {{ $proyek->nama_proyek }}</div>

                <div class="col-md-6"><strong>Tahun:</strong> {{ $proyek->tahun }}</div>
                <div class="col-md-6"><strong>Lokasi:</strong> {{ $proyek->lokasi }}</div>

                <div class="col-md-6"><strong>Anggaran:</strong> Rp {{ number_format($proyek->anggaran) }}</div>
                <div class="col-md-6"><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</div>

                <div class="col-md-12"><strong>Deskripsi:</strong>
                    <p class="mt-2">{{ $proyek->deskripsi }}</p>
                </div>
            </div>
        </div>



        <!-- ========================= -->
        <!-- === TAHAPAN PROYEK ====== -->
        <!-- ========================= -->
        <div class="section-title mb-4">
            <h2 class="text-anime-style-3" data-cursor="-opaque">Tahapan Proyek</h2>
        </div>

        @if($proyek->tahapan->count() == 0)
            <div class="alert alert-warning">Belum ada tahapan untuk proyek ini.</div>
        @else
            <table class="table table-bordered table-striped mb-5">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Tahap</th>
                        <th>Target (%)</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyek->tahapan as $i => $tahap)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $tahap->nama_tahap }}</td>
                            <td>{{ $tahap->target_persen }}%</td>
                            <td>{{ $tahap->tgl_mulai }}</td>
                            <td>{{ $tahap->tgl_selesai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif



        <!-- =============================== -->
        <!-- === DETAIL PROGRESS PER TAHAP == -->
        <!-- =============================== -->
        <div class="section-title mt-5 mb-4">
            <h2 class="text-anime-style-3" data-cursor="-opaque">Progress Pekerjaan</h2>
        </div>

        @foreach($proyek->tahapan as $tahap)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Progress Tahap: {{ $tahap->nama_tahap }}</h5>
                </div>

                <div class="card-body">
                    @if($tahap->progress->count() == 0)
                        <div class="alert alert-info">Belum ada progress pada tahap ini.</div>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Persen Real</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tahap->progress as $index => $pg)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pg->persen_real }}%</td>
                                        <td>{{ $pg->tanggal }}</td>
                                        <td>{{ $pg->catatan }}</td>
                                        <td>
                                            @if($pg->foto)
                                                <img src="{{ asset('storage/progres_proyek/' . $pg->foto) }}"
                                                    style="width: 100px; height: 80px; object-fit: cover;">
                                            @else
                                                <small class="text-muted">Tidak ada foto</small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endforeach


        <a href="{{ route('proyek-guest.index') }}" class="btn-default mt-4">
            <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Daftar Proyek
        </a>

    </div>

@endsection
