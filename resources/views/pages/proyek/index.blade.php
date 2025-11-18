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
        <a href="{{ route('proyek-guest.create') }}">
            <div class="col-md-12">
                <button type="submit" class="btn-default">
                    <i class="fa-solid fa-plus me-2"></i> Tambah Proyek
                </button>
            </div>
        </a>
    </div>

    <!-- Start Project Cards Section -->
    <section>
        <div class="our-projects">
            <div class="light-bg-section">
                <div class="container-fluid">

                    <div class="row">
                        @forelse ($dataProyek as $proyek)
                            <div class="col-lg-3 col-md-6">
                                <!-- Project Item Start -->
                                <div class="project-item wow fadeInUp" data-wow-delay="0.25s">
                                    <div class="project-image" data-cursor-text="View">
                                        <a href="#">
                                            <figure>
                                                <img src="images/our-project-1.jpg" alt="">
                                            </figure>
                                        </a>
                                    </div>

                                    <div class="project-body">
                                        <div class="project-body-title">
                                            <h3>{{ $proyek->nama_proyek }}</h3>
                                        </div>

                                        <div class="project-content">
                                            <p>{{ Str::limit($proyek->deskripsi, 100) }}</p>
                                            <div class="project-content-footer">
                                                <a href="{{ route('detail-proyek', $proyek->proyek_id) }}"
                                                    class="readmore-btn">Lihat Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Project Item End -->
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p>Belum ada data proyek</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $dataProyek->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- End Project Cards Section -->
@endsection
