@extends('layouts.guest.app')

@section('content')
    <!-- =================== HERO =================== -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Detail Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Informasi lengkap proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================== CONTAINER =================== -->
    <div class="container py-5">

        <div class="section-title">
            <h3>{{ $proyek->nama_proyek }}</h3>
            <h2 class="text-anime-style-3">Gallery Media Proyek</h2>
        </div>
        <!-- ------------- Gallery Media Proyek ------------- -->
        <div class="project-media mb-5">
            @if ($medias->count() > 0)
                @php
                    $thumbnail = $medias->firstWhere('sort_order', 0);
                    $otherMedia = $medias->where('sort_order', '>', 0);
                @endphp

                <!-- Thumbnail Utama -->
                @if ($thumbnail)
                    <div class="mb-3 text-center">
                        <a href="{{ asset('storage/' . $thumbnail->file_name) }}" class="glightbox"
                            data-gallery="project-{{ $proyek->proyek_id }}">
                            <img src="{{ asset('storage/' . $thumbnail->file_name) }}"
                                alt="Thumbnail {{ $proyek->nama_proyek }}" class="img-fluid rounded"
                                style="max-height:450px; width:100%; object-fit:cover;">
                        </a>
                    </div>
                @endif

                <!-- Media Lain (Grid ala Facebook) -->
                @if ($otherMedia->count() > 0)
                    <div class="row g-2">
                        @foreach ($otherMedia as $media)
                            @php $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION)); @endphp
                            <div class="col-6 col-md-3 col-lg-3">
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                    <a href="{{ asset('storage/' . $media->file_name) }}" class="glightbox"
                                        data-gallery="project-{{ $proyek->proyek_id }}">
                                        <img src="{{ asset('storage/' . $media->file_name) }}"
                                            alt="Media {{ $loop->iteration }}" class="img-fluid rounded mb-2"
                                            style="height:200px; width:100%; object-fit:cover;">
                                    </a>
                                @elseif($ext === 'pdf')
                                    <div class="border rounded p-2 text-center bg-light mb-2"
                                        style="height:200px; display:flex; align-items:center; justify-content:center;">
                                        <a href="{{ asset('storage/' . $media->file_name) }}"
                                            target="_blank">{{ $media->file_name }}</a>
                                    </div>
                                @else
                                    <div class="border rounded p-2 text-center bg-light mb-2"
                                        style="height:200px; display:flex; align-items:center; justify-content:center;">
                                        {{ $media->file_name }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <p class="text-center text-muted">Belum ada media yang diupload untuk proyek ini.</p>
            @endif
        </div>

        <!-- Tambahkan CSS opsional -->
        <style>
            .project-media img:hover {
                transform: scale(1.05);
                transition: all 0.3s ease-in-out;
            }
        </style>


        <!-- ------------- Informasi Umum Proyek ------------- -->

        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.2s">
            <div class="section-title">
                <h3>{{ $proyek->nama_proyek }}</h3>
                <h2 class="text-anime-style-3">Informasi Umum</h2>
            </div>

            <div class="row">
                @php
                    $fields = [
                        'Kode Proyek' => $proyek->kode_proyek,
                        'Nama Proyek' => $proyek->nama_proyek,
                        'Tahun' => $proyek->tahun,
                        'Lokasi' => $proyek->lokasi,
                        'Anggaran' => 'Rp ' . number_format($proyek->anggaran, 0, ',', '.'),
                        'Sumber Dana' => $proyek->sumber_dana,
                    ];
                @endphp

                @foreach ($fields as $label => $value)
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold">{{ $label }}</label>
                        <input type="text" class="form-control" value="{{ $value }}" disabled>
                    </div>
                @endforeach

                <div class="col-md-12 mb-4">
                    <label class="fw-bold">Deskripsi</label>
                    <textarea class="form-control" rows="4" disabled>{{ $proyek->deskripsi }}</textarea>
                </div>

                {{-- Lokasi Proyek --}}
                <input  id="db-lat" value="{{ $proyek->lat }}">
                <input  id="db-lng" value="{{ $proyek->lng }}">
                <input type="hidden" id="db-geojson" value='{{ $proyek->geojson }}'>


                <div class="col-md-12 mb-4">
                    <label class="fw-bold">Lokasi Proyek</label>
                    <div id="map" style="height:400px; border-radius:10px;"></div>
                </div>


                @if (auth()->user()->role !== 'user')
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{ route('proyek-guest.edit', $proyek->proyek_id) }}"
                            class="btn-default d-inline-flex gap-2">
                            <i data-feather="edit"></i> Edit Proyek
                        </a>

                        <form action="{{ route('proyek-guest.destroy', $proyek->proyek_id) }}" method="POST"
                            class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn-default d-inline-flex gap-2">
                                <i data-feather="trash-2"></i> Hapus Proyek
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <!-- ------------- Tahapan Proyek ------------- -->
        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.3s">
            <div class="section-title d-flex justify-content-between align-items-center">
                <div>
                    <h3>Tahapan Proyek</h3>
                    <h2 class="text-anime-style-3">Daftar Tahapan</h2>
                </div>
                @if (auth()->user()->role !== 'user')
                    <a href="{{ route('tahapan-guest.show', $proyek->proyek_id) }}"
                        class="btn-default d-flex align-items-center gap-2 order-3 order-md-2">
                        <i data-feather="plus-circle"></i> Tambah Tahapan
                    </a>
                @endif
            </div>

            <div class="section-title d-flex flex-wrap justify-content-between align-items-center gap-3">

                <!-- SEARCH -->
                <form method="GET" action="" class="d-flex flex-wrap align-items-center gap-2 order-2 order-md-3">
                    <div class="search-box-group d-flex align-items-center">
                        <input type="text" name="search_tahapan" placeholder="Cari Tahapan..."
                            value="{{ request('search_tahapan') }}" class="search-box-input">

                        <button type="submit" class="search-box-button">
                            <i class="fa fa-search"></i>
                        </button>

                        @if (request('search_tahapan'))
                            <a href="{{ url()->current() }}?{{ http_build_query(request()->except('search_tahapan')) }}"
                                class="search-box-clear">
                                Clear
                            </a>
                        @endif
                    </div>

                    {{-- Hidden filters lain agar tidak hilang --}}
                    @if (request('sumber_dana'))
                        <input type="hidden" name="sumber_dana" value="{{ request('sumber_dana') }}">
                    @endif

                    @if (request('tahun'))
                        <input type="hidden" name="tahun" value="{{ request('tahun') }}">
                    @endif
                </form>

                <!-- FILTER -->
                <form method="GET" action="" class="d-flex flex-wrap gap-2">
                    <!-- FILTER TANGGAL MULAI -->
                    <input type="date" name="tahapan_mulai" value="{{ request('tahapan_mulai') }}"
                        class="form-control">

                    <!-- FILTER TANGGAL SELESAI -->
                    <input type="date" name="tahapan_selesai" value="{{ request('tahapan_selesai') }}"
                        class="form-control">
                    <button type="submit" class="btn btn-danger">Filter</button>

                    @if (request()->except('page'))
                        <a href="{{ url()->current() }}" class="btn btn-secondary">Clear</a>
                    @endif
                </form>
            </div>

            {{-- LIST PROGRESS --}}
            @forelse ($tahapan as $t)
                <div id="progress-container-{{ $t->tahap_id }}">
                    @include('pages.proyek.progress-item', ['t' => $t])
                </div>
            @empty
                <p class="text-center text-muted">Belum ada tahapan.</p>
            @endforelse

            {{-- PAGINATION TAHAPAN --}}
            <div class="d-flex justify-content-center">
                {{ $tahapan->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    @include('layouts.guest.maps-view')
    @include('layouts.guest.load-progress')
@endsection
