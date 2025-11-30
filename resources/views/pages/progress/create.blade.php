@extends('layouts.guest.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Tambahkan Progress Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Progress untuk proyek: <strong>{{ $proyek->nama_proyek }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Form -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <div class="section-title">
            <h3 class="wow fadeInUp">{{ $proyek->nama_proyek }}</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Tambah Progress</h2>
        </div>

        <form action="{{ route('progress-guest.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <!-- PROYEK ID (HIDDEN) -->
            <input type="hidden" name="proyek_id" value="{{ $proyek->proyek_id }}">

            <div class="row">

                <!-- TAHAP -->
                <div class="form-group col-md-12 mb-4">
                    <label class="fw-bold mb-2">Pilih Tahap Proyek</label>
                    <select name="tahap_id" class="form-control" required>
                        <option value="">-- Pilih Tahapan --</option>
                        @foreach($tahapan as $t)
                            <option value="{{ $t->tahap_id }}">
                                {{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)
                            </option>
                        @endforeach
                    </select>
                    @error('tahap_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- PERSEN REAL -->
                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="persen_real" class="form-control"
                        placeholder="Persentase Real (%)" min="0" max="100" step="0.1" required>
                </div>

                <!-- TANGGAL -->
                <div class="form-group col-md-6 mb-4">
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ date('Y-m-d') }}" required>
                </div>

                <!-- CATATAN -->
                <div class="form-group col-md-12 mb-4">
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan Progress"></textarea>
                </div>

                <!-- Upload Thumbnail -->
                <div class="form-group col-md-6 mb-4">
                    <label for="thumbnail" class="form-label fw-bold">Thumbnail Proyek</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
                    <small class="text-muted">Pilih gambar untuk thumbnail (jpg, jpeg, png, max 10MB)</small>
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

                <!-- BUTTON -->
                <div class="col-md-12">
                    <button type="submit" class="btn-default">
                        <i class="fa-solid fa-plus me-2"></i> Tambah Progress
                    </button>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.guest.media-script')

@endsection
