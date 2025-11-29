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
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Edit Tahapan Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Proyek: <strong>{{ $proyek->nama_proyek }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->


    <!-- Tahapan Edit Form start -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <!-- Media Tahapan -->
        <div class="project-media mb-5">
            @php
                $medias = $tahapan->medias ?? collect();
            @endphp

            @if ($medias->count() > 0)
                @php
                    $thumbnail = $medias->firstWhere('sort_order', 0);
                    $otherMedia = $medias->where('sort_order', '>', 0);
                @endphp

                <!-- Thumbnail Utama -->
                @if ($thumbnail)
                    <div class="mb-3 text-center">
                        <a href="{{ asset('storage/' . $thumbnail->file_name) }}" class="glightbox"
                            data-gallery="edit-tahapan-{{ $tahapan->id }}">
                            <img src="{{ asset('storage/' . $thumbnail->file_name) }}"
                                alt="Thumbnail {{ $tahapan->nama_tahap }}" class="img-fluid rounded"
                                style="max-height:250px; width:100%; object-fit:cover;">
                        </a>
                    </div>

                    <!-- Tombol hapus thumbnail -->
                    <form action="{{ route('media.destroy', $thumbnail->media_id) }}" method="POST"
                        class="text-center mb-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Thumbnail</button>
                    </form>
                @endif

                <!-- Media Lain (Grid) -->
                @if ($otherMedia->count() > 0)
                    <div class="row g-2">
                        @foreach ($otherMedia as $media)
                            @php $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION)); @endphp
                            <div class="col-6 col-md-3 mb-3">
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                    <a href="{{ asset('storage/' . $media->file_name) }}" class="glightbox"
                                        data-gallery="edit-tahapan-{{ $tahapan->id }}">
                                        <img src="{{ asset('storage/' . $media->file_name) }}" class="img-fluid rounded"
                                            style="height:150px; width:100%; object-fit:cover;">
                                    </a>
                                @elseif($ext === 'pdf')
                                    <div class="border rounded p-2 text-center bg-light"
                                        style="height:150px; display:flex; align-items:center; justify-content:center;">
                                        <i class="fa-solid fa-file-pdf fa-2x text-danger mb-1"></i>
                                        <div>
                                            <a href="{{ asset('storage/' . $media->file_name) }}"
                                                target="_blank">{{ $media->file_name }}</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="border rounded p-2 text-center bg-light"
                                        style="height:150px; display:flex; align-items:center; justify-content:center;">
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
                <p class="text-center text-muted">Belum ada media untuk tahapan ini.</p>
            @endif
        </div>


        <!-- Section Title Start -->
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">
                Edit Tahapan untuk Proyek : {{ $proyek->nama_proyek }}
            </h2>
        </div>
        <!-- Section Title End -->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('tahapan-guest.update2', ['proyek' => $proyek->proyek_id, 'tahapan' => $tahapan->tahap_id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="proyek_id" value="{{ $proyek->proyek_id }}">

            <div class="row">
                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="nama_tahap" class="form-control" placeholder="Nama Tahapan"
                        value="{{ old('nama_tahap', $tahapan->nama_tahap) }}" required>
                    @error('nama_tahap')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3 mb-4">
                    <input type="number" step="0.01" name="target_persen" class="form-control" placeholder="Target (%)"
                        value="{{ old('target_persen', $tahapan->target_persen) }}" required>
                    @error('target_persen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control"
                        value="{{ old('tgl_mulai', $tahapan->tgl_mulai) }}" required>
                    @error('tgl_mulai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control"
                        value="{{ old('tgl_selesai', $tahapan->tgl_selesai) }}" required>
                    @error('tgl_selesai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
                    <button type="submit" class="btn-default">
                        <i class="fa-solid fa-save me-2"></i> Update Tahapan
                    </button>
                </div>
            </div>

        </form>
    </div>
    <!-- End Form Section -->

    @include('layouts.guest.media-script')
@endsection
