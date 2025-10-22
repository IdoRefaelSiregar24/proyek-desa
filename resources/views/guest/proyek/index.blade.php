@extends('guest.layouts.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Progress Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Berikut Beberapa Data Progress Proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <div class="container py-4 text-end">
        <a href="">
            <div class="col-md-12">
                <button type="submit" class="btn-default">Tambah Proyek</button>
                <div id="msgSubmit" class="h3"></div>
            </div>
        </a>
    </div>

    <!-- Start Project Cards Section -->
    <section class="project-cards py-5">
        <div class="container">
            <div class="row g-4">
                @forelse ($dataProyek as $proyek)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $proyek->nama_proyek }}</h5>
                                <p class="text-muted mb-1"><strong>Kode:</strong> {{ $proyek->kode_proyek }}</p>
                                <p class="text-muted mb-1"><strong>Tahun:</strong> {{ $proyek->tahun }}</p>
                                <p class="text-muted mb-1"><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
                                <p class="text-muted mb-2"><strong>Anggaran:</strong> Rp
                                    {{ number_format($proyek->anggaran, 0, ',', '.') }}</p>
                                <p class="card-text mb-3">{{ Str::limit($proyek->deskripsi, 100) }}</p>

                                <div class="mb-3">
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: {{ $proyek->progress ?? 0 }}%;"
                                            aria-valuenow="{{ $proyek->progress ?? 0 }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            {{ $proyek->progress ?? 0 }}%
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-auto text-end">
                                    @if (($proyek->progress ?? 0) == 100)
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Dalam Proses</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada data proyek</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Project Cards Section -->
@endsection
