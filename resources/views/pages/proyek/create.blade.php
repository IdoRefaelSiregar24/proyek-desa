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

        <form action="{{ route('proyek-guest.store') }}" method="POST" enctype="multipart/form-data" validate>
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
                    <select name="sumber_dana" id="sumber_dana" class="form-control" required>
                        <option value="">-- Pilih Sumber Dana --</option>
                        <option value="APBN" {{ old('sumber_dana') == 'APBN' ? 'selected' : '' }}>APBN</option>
                        <option value="APBD" {{ old('sumber_dana') == 'APBD' ? 'selected' : '' }}>APBD</option>
                        <option value="Swasta" {{ old('sumber_dana') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                        <option value="Hibah" {{ old('sumber_dana') == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>

                    @error('sumber_dana')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lokasi Proyek (Koordinat) -->
                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="lat" class="form-control" id="lat"
                        placeholder="Latitude (contoh: -0.507068)" value="{{ old('lat') }}" readonly required>
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="lng" class="form-control" id="lng"
                        placeholder="Longitude (contoh: 101.447779)" value="{{ old('lng') }}" readonly required>
                </div>

                <div class="form-group col-md-12 mb-4">
                    <label class="fw-bold">Tentukan Lokasi Proyek</label>
                    <div id="map" style="height:400px; border-radius:10px;"></div>
                </div>

                <!-- GeoJSON hasil dari peta -->
                <input type="hidden" name="geojson" id="geojson">


                {{-- Deskripsi --}}
                <div class="form-group col-md-12 mb-5">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Thumbnail -->
                <div class="form-group col-md-6 mb-4">
                    <label for="thumbnail" class="form-label fw-bold">Thumbnail Proyek</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*"
                        required>
                    <small class="text-muted">Pilih gambar untuk thumbnail (jpg, jpeg, png, max 50MB)</small>
                    <div class="mt-2">
                        <img id="previewThumbnail" src="{{ asset('storage/default-thumbnail.jpg') }}"
                            alt="Preview Thumbnail" class="img-fluid rounded" style="max-height:150px;">
                    </div>
                </div>

                <!-- Upload Multiple Media -->
                <div class="form-group col-md-6 mb-4">
                    <label for="media_files" class="form-label fw-bold">Gallery / Media Lainnya</label>
                    <input type="file" class="form-control" id="media_files" name="media_files[]"
                        accept="image/*,application/pdf" multiple>
                    <small class="text-muted">Pilih beberapa file media (jpg, png, gif, pdf, max 50MB per file)</small>
                    <div id="previewMedia" class="mt-2 d-flex flex-wrap gap-2"></div>
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
    @include('layouts.guest.media-script')
    @include('layouts.guest.maps-script')
@endsection
