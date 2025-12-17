@extends('layouts.guest.app')

@section('content')
    <!-- =================== HERO =================== -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Detail Kontraktor</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Informasi lengkap kontraktor proyek
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================== CONTAINER =================== -->
    <div class="container py-5">

        <div class="section-title">
            <h3>{{ $kontraktor->nama }}</h3>
            <h2 class="text-anime-style-3">Gallery Media Kontraktor</h2>
        </div>

        <!-- =================== GALLERY MEDIA =================== -->
        <div class="project-media mb-5">
            @if ($medias->count() > 0)
                @php
                    $thumbnail = $medias->firstWhere('sort_order', 0);
                    $otherMedia = $medias->where('sort_order', '>', 0);
                @endphp

                {{-- LOGO / THUMBNAIL --}}
                @if ($thumbnail)
                    <div class="mb-3 text-center">
                        <a href="{{ asset('storage/' . $thumbnail->file_name) }}" class="glightbox"
                            data-gallery="kontraktor-{{ $kontraktor->kontraktor_id }}">
                            <img src="{{ asset('storage/' . $thumbnail->file_name) }}" class="img-fluid rounded"
                                style="max-height:450px; width:100%; object-fit:contain;">
                        </a>
                    </div>
                @endif

                {{-- MEDIA LAIN --}}
                @if ($otherMedia->count() > 0)
                    <div class="row g-2">
                        @foreach ($otherMedia as $media)
                            @php $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION)); @endphp
                            <div class="col-6 col-md-3 col-lg-3">
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                    <a href="{{ asset('storage/' . $media->file_name) }}" class="glightbox"
                                        data-gallery="kontraktor-{{ $kontraktor->kontraktor_id }}">
                                        <img src="{{ asset('storage/' . $media->file_name) }}"
                                            class="img-fluid rounded mb-2"
                                            style="height:200px; width:100%; object-fit:cover;">
                                    </a>
                                @elseif ($ext === 'pdf')
                                    <div class="border rounded p-2 text-center bg-light mb-2"
                                        style="height:200px; display:flex; align-items:center; justify-content:center;">
                                        <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank">
                                            {{ $media->file_name }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <p class="text-center text-muted">Belum ada media kontraktor.</p>
            @endif
        </div>

        <!-- =================== INFORMASI KONTRAKTOR =================== -->
        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.2s">

            <!-- ================= PROYEK YANG DIPEGANG ================= -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body text-center py-4">

                    <h5 class="text-muted mb-3">Proyek yang Dipegang</h5>

                    <h2 class="text-anime-style-3 text-primary mb-3">
                        {{ optional($kontraktor->proyek)->nama_proyek ?? 'Belum Terhubung Proyek' }}
                    </h2>

                    @if ($kontraktor->proyek)
                        <a href="{{ route('detail-proyek', $kontraktor->proyek->proyek_id) }}"
                            class="btn-default d-inline-flex align-items-center gap-2">
                            <i data-feather="eye"></i> Detail Proyek
                        </a>
                    @endif

                </div>
            </div>

            <!-- ================= INFORMASI KONTRAKTOR ================= -->
            <div class="section-title mb-4">
                <h3>{{ $kontraktor->nama }}</h3>
                <h2 class="text-anime-style-3">Informasi Kontraktor</h2>
            </div>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Nama Kontraktor</label>
                    <input type="text" class="form-control" value="{{ $kontraktor->nama }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Penanggung Jawab</label>
                    <input type="text" class="form-control" value="{{ $kontraktor->penanggung_jawab }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Kontak</label>
                    <input type="text" class="form-control" value="{{ $kontraktor->kontak }}" disabled>
                </div>

                <!-- ALAMAT DISEJAJARKAN DENGAN KONTAK -->
                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Alamat</label>
                    <textarea class="form-control" rows="3" disabled>{{ $kontraktor->alamat }}</textarea>
                </div>

                @if (auth()->check() && auth()->user()->role !== 'user')
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{ route('kontraktor.edit', $kontraktor->kontraktor_id) }}"
                            class="btn-default d-inline-flex align-items-center gap-2">
                            <i data-feather="edit"></i> Edit Kontraktor
                        </a>
                    </div>
                @endif

            </div>
        </div>



    </div>

    <style>
        .project-media img:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }
    </style>
@endsection
