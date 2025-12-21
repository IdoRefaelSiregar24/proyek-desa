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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Daftar Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Berikut Beberapa Data Progress Proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    {{-- button create,filter, dan search --}}

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center">

            <!-- ==================== SEARCH (KIRI) ==================== -->
            <form method="GET" action="" class="d-flex align-items-center">

                <div class="search-box-group">
                    <input type="text" name="search" placeholder="Cari proyek..." value="{{ request('search') }}"
                        class="search-box-input">

                    <button type="submit" class="search-box-button">
                        <i class="fa fa-search"></i>
                    </button>

                    @if (request('search'))
                        <a href="{{ url()->current() }}?{{ http_build_query(request()->except('search')) }}"
                            class="search-box-clear">
                            Clear
                        </a>
                    @endif
                </div>

                <!-- Hidden filters -->
                @if (request('sumber_dana'))
                    <input type="hidden" name="sumber_dana" value="{{ request('sumber_dana') }}">
                @endif
                @if (request('tahun'))
                    <input type="hidden" name="tahun" value="{{ request('tahun') }}">
                @endif

            </form>


            <!-- ================= FILTER (KANAN) ===================== -->
            <form method="GET" action="" class="d-flex gap-3">

                <input type="hidden" name="search" value="{{ request('search') }}">

                <!-- Filter Sumber Dana -->
                <select name="sumber_dana" class="select-default" onchange="this.form.submit()">
                    <option value="">Sumber Dana</option>
                    <option value="APBN" {{ request('sumber_dana') == 'APBN' ? 'selected' : '' }}>APBN</option>
                    <option value="APBD" {{ request('sumber_dana') == 'APBD' ? 'selected' : '' }}>APBD</option>
                    <option value="Swasta" {{ request('sumber_dana') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                    <option value="Hibah" {{ request('sumber_dana') == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                </select>

                <!-- Filter Tahun -->
                <select name="tahun" class="select-default" onchange="this.form.submit()">
                    <option value="">Tahun</option>
                    @foreach ($listTahun as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endforeach
                </select>
            </form>

            <!-- ==================== CREATE BUTTON ==================== -->
            <a href="{{ route('proyek-guest.create') }}">
                <button type="button" class="btn-default">
                    <i class="fa-solid fa-plus me-2"></i> Tambah Proyek
                </button>
            </a>
        </div>
    </div>



    {{-- End button create,filter, dan search --}}


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
                                        <a href="{{ route('detail-proyek', $proyek->proyek_id) }}">
                                            <figure>
                                                @php
                                                    $thumbnail = $thumbnails[$proyek->proyek_id] ?? null;
                                                @endphp

                                                @if ($thumbnail && $thumbnail->file_name)
                                                    <img src="{{ asset('storage/' . $thumbnail->file_name) }}"
                                                        alt="thumbnail">
                                                @else
                                                    <img src="{{ asset('images/placeholder.jpg') }}"
                                                        alt="thumbnail">
                                                @endif
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
