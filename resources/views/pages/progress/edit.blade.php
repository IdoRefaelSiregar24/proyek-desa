@extends('layouts.guest.app')

@section('content')

    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Edit Progress Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Proyek: <strong>{{ $proyek->nama_proyek }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= MEDIA SECTION ================ -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <div class="section-title mb-4">
            <h3 class="wow fadeInUp">Media Progress</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Kelola Media Progress</h2>
        </div>

        @php
            $medias = $progress->medias ?? collect();
            $thumbnail = $medias->first();
            $otherMedia = $medias->skip(1);
        @endphp

        {{-- Thumbnail utama --}}
        @if ($thumbnail)
            <div class="text-center mb-3">
                <a href="{{ asset('storage/' . $thumbnail->file_name) }}" class="glightbox"
                    data-gallery="progress-edit-{{ $progress->progres_id }}">
                    <img src="{{ asset('storage/' . $thumbnail->file_name) }}" class="rounded"
                        style="max-height:250px;width:100%;object-fit:cover;">
                </a>
            </div>

            <form action="{{ route('media.destroy', $thumbnail->media_id) }}" method="POST" class="text-center mb-4">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash"></i> Hapus Thumbnail
                </button>
            </form>
        @endif

        {{-- Media Lain --}}
        @if ($otherMedia->count() > 0)
            <div class="row g-2 mb-4">
                @foreach ($otherMedia as $m)
                    @php $ext = strtolower(pathinfo($m->file_name,PATHINFO_EXTENSION)); @endphp

                    <div class="col-6 col-md-2 mb-3">

                        {{-- IMAGE --}}
                        @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                            <a href="{{ asset('storage/' . $m->file_name) }}" class="glightbox"
                                data-gallery="progress-edit-{{ $progress->progres_id }}">
                                <img src="{{ asset('storage/' . $m->file_name) }}" class="rounded shadow-sm"
                                    style="height:110px;width:100%;object-fit:cover;">
                            </a>

                            {{-- PDF --}}
                        @elseif($ext == 'pdf')
                            <div class="p-2 rounded border text-center small bg-light" style="height:110px">
                                <i class="fa-solid fa-file-pdf text-danger fs-3"></i>
                                <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank" class="d-block">PDF</a>
                            </div>

                            {{-- FILE LAIN --}}
                        @else
                            <div class="p-2 rounded border text-center small bg-light">{{ $m->file_name }}</div>
                        @endif

                        <form action="{{ route('media.destroy', $m->media_id) }}" method="POST" class="mt-1">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger w-100">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">Belum ada media untuk progress ini.</p>
        @endif

    </div>

    <!-- ==================== FORM UPDATE ==================== -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.3s">

        <div class="section-title">
            <h3 class="wow fadeInUp">{{ $proyek->nama_proyek }}</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Edit Progress</h2>
        </div>

        <form action="{{ route('progress-guest.update', $progress->progres_id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf @method('PUT')

            <input type="hidden" name="proyek_id" value="{{ $proyek->proyek_id }}">

            <div class="row">

                <!-- Tahap -->
                <!-- Tahap Proyek -->
                <div class="col-md-12 mb-3">
                    <label class="fw-bold mb-1">Tahap Proyek</label>

                    <input type="text" class="form-control"
                        value="{{ $progress->tahap->nama_tahap }} (Target: {{ $progress->tahap->target_persen }}%)"
                        readonly>

                    <input type="hidden" name="tahap_id" value="{{ $progress->tahap_id }}">
                </div>


                <div class="col-md-6 mb-3">
                    <input type="number" name="persen_real" class="form-control" min="0" max="100"
                        step="0.1" value="{{ $progress->persen_real }}" placeholder="Persentase Real (%)" required>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="date" name="tanggal" class="form-control" value="{{ $progress->tanggal }}" required>
                </div>

                <div class="col-md-12 mb-3">
                    <textarea name="catatan" rows="3" class="form-control" placeholder="Catatan progress">{{ $progress->catatan }}</textarea>
                </div>

                <!-- Upload Media Baru -->
                <!-- Upload Thumbnail -->
                <div class="form-group col-md-6 mb-4">
                    <label for="thumbnail" class="form-label fw-bold">Thumbnail Tahapan Baru</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                    <small class="text-muted">Pilih gambar untuk thumbnail (jpg, jpeg, png, max 10MB)</small>
                    <div class="mt-2">
                        <img id="previewThumbnail" src="{{ asset('storage/default-thumbnail.jpg') }}"
                            alt="Preview Thumbnail" class="img-fluid rounded" style="max-height:150px;">
                    </div>
                </div>

                <!-- Upload Multiple Media -->
                <div class="form-group col-md-6 mb-4">
                    <label for="media_files" class="form-label fw-bold">Gallery / Media Tahapan Lainnya Baru</label>
                    <input type="file" class="form-control" id="media_files" name="media_files[]"
                        accept="image/*,application/pdf" multiple>
                    <small class="text-muted">Pilih beberapa file media (jpg, png, gif, pdf, max 50MB per file)</small>
                    <div id="previewMedia" class="mt-2 d-flex flex-wrap gap-2"></div>
                </div>

                <div class="col-md-12">
                    <button class="btn-default"><i class="fa-solid fa-save me-2"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.guest.media-script')
@endsection
