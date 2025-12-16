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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Proyek Desa</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Perbarui data proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <br>


    <!-- Proyek Form start -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <!-- Media Section -->
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
                            data-gallery="edit-project-{{ $proyek->proyek_id }}">
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
                                        data-gallery="edit-project-{{ $proyek->proyek_id }}">
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

                                <!-- Tombol Hapus Media -->
                                <form action="{{ route('media.destroy', $media->media_id) }}" method="POST"
                                    class="mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <p class="text-center text-muted">Belum ada media yang diupload untuk proyek ini.</p>
            @endif
        </div>

        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Proyek Desa</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('proyek-guest.update', $proyek->proyek_id) }}" method="POST" enctype="multipart/form-data"
            novalidate>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="kode_proyek" class="form-control" id="kode_proyek" placeholder="Kode Proyek"
                        value="{{ old('kode_proyek', $proyek->kode_proyek) }}" required>
                    @error('kode_proyek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="nama_proyek" class="form-control" id="nama_proyek" placeholder="Nama Proyek"
                        value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required>
                    @error('nama_proyek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Tahun"
                        value="{{ old('tahun', $proyek->tahun) }}" required>
                    @error('tahun')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi"
                        value="{{ old('lokasi', $proyek->lokasi) }}" required>
                    @error('lokasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="anggaran" class="form-control" id="anggaran" placeholder="Anggaran"
                        value="{{ old('anggaran', $proyek->anggaran) }}" required>
                    @error('anggaran')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="sumber_dana" class="form-control" id="sumber_dana" placeholder="Sumber Dana"
                        value="{{ old('sumber_dana', $proyek->sumber_dana) }}" required>
                    @error('sumber_dana')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-5">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi" required>{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- KOORDINAT -->
                <div class="col-md-6 mb-4">
                    <input type="text" name="lat" id="lat" class="form-control"
                        value="{{ old('lat', optional($proyek->lokasiProyek)->lat) }}">
                </div>

                <div class="col-md-6 mb-4">
                    <input type="text" name="lng" id="lng" class="form-control"
                        value="{{ old('lng', optional($proyek->lokasiProyek)->lng) }}">
                </div>

                <div class="col-md-12 mb-4">
                    <label class="fw-bold">Tentukan Lokasi Proyek</label><br>
                    <div id="map" style="height:400px; border-radius:10px;"></div>
                </div> <br>

                <input type="hidden" name="geojson" id="geojson"
                    value='{{ old('geojson', optional($proyek->lokasi)->geojson) }}'>

                <!-- Upload Media Baru -->
                <!-- Upload Thumbnail -->
                <div class="form-group col-md-6 mb-4">
                    <label for="thumbnail" class="form-label fw-bold">Thumbnail Proyek Baru</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*"
                        required>
                    <small class="text-muted">Pilih gambar untuk thumbnail (jpg, jpeg, png, max 10MB)</small>
                    <div class="mt-2">
                        <img id="previewThumbnail" src="{{ asset('storage/default-thumbnail.jpg') }}"
                            alt="Preview Thumbnail" class="img-fluid rounded" style="max-height:150px;">
                    </div>
                </div>

                <!-- Upload Multiple Media -->
                <div class="form-group col-md-6 mb-4">
                    <label for="media_files" class="form-label fw-bold">Gallery / Media Lainnya Baru</label>
                    <input type="file" class="form-control" id="media_files" name="media_files[]"
                        accept="image/*,application/pdf" multiple>
                    <small class="text-muted">Pilih beberapa file media (jpg, png, gif, pdf, max 50MB per file)</small>
                    <div id="previewMedia" class="mt-2 d-flex flex-wrap gap-2"></div>
                </div>

                <div class="col-md-12 mt-4 d-flex gap-3 justify-content-center">

                    <form action="{{ route('proyek-guest.update', $proyek->proyek_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn-default d-flex align-items-center gap-2">
                            <i data-feather="save"></i> Perbarui Proyek
                        </button>
                    </form>

                    <form action="{{ route('proyek-guest.destroy', $proyek->proyek_id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini? Data proyek akan hilang permanen.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn-default bg-danger text-white border-0 d-flex align-items-center gap-2">
                            <i data-feather="trash-2"></i> Hapus Proyek
                        </button>
                    </form>
                </div>


            </div>

    </div>
    <!-- End Form Section -->
    @include('layouts.guest.media-script')
    @include('layouts.guest.maps-input')
@endsection
