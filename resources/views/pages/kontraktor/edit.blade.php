@extends('layouts.guest.app')

@section('content')
    <!-- ================= HERO ================= -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Edit Kontraktor</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Perbarui data kontraktor proyek
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- ================= FORM ================= -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <!-- ================= MEDIA KONTRAKTOR ================= -->
        <div class="project-media mb-5">
            @if ($medias->count() > 0)
                @php
                    $logo = $medias->firstWhere('sort_order', 0);
                    $otherMedia = $medias->where('sort_order', '>', 0);
                @endphp

                {{-- LOGO --}}
                @if ($logo)
                    <div class="mb-4 text-center">
                        <h5 class="fw-bold mb-2">Logo Kontraktor</h5>
                        <a href="{{ asset('storage/' . $logo->file_name) }}" class="glightbox"
                            data-gallery="edit-kontraktor-{{ $kontraktor->kontraktor_id }}">
                            <img src="{{ asset('storage/' . $logo->file_name) }}" class="img-fluid rounded shadow"
                                style="max-height:300px; object-fit:contain;">
                        </a>

                        <form action="{{ route('media.destroy', $logo->media_id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus Logo</button>
                        </form>
                    </div>
                @endif

                {{-- MEDIA LAIN --}}
                @if ($otherMedia->count() > 0)
                    <div class="row g-2">
                        @foreach ($otherMedia as $media)
                            @php $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION)); @endphp
                            <div class="col-6 col-md-3">
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                    <a href="{{ asset('storage/' . $media->file_name) }}" class="glightbox"
                                        data-gallery="edit-kontraktor-{{ $kontraktor->kontraktor_id }}">
                                        <img src="{{ asset('storage/' . $media->file_name) }}"
                                            class="img-fluid rounded mb-2"
                                            style="height:180px; width:100%; object-fit:cover;">
                                    </a>
                                @else
                                    <div class="border rounded p-2 text-center bg-light mb-2"
                                        style="height:180px; display:flex; align-items:center; justify-content:center;">
                                        <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank">
                                            {{ $media->file_name }}
                                        </a>
                                    </div>
                                @endif

                                <form action="{{ route('media.destroy', $media->media_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger w-100">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <p class="text-center text-muted">Belum ada media kontraktor.</p>
            @endif
        </div>

        <!-- ================= TITLE ================= -->
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Form Edit Kontraktor</h2>
        </div>

        <!-- ================= ALERT ================= -->
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ================= FORM ================= -->
        <form action="{{ route('kontraktor.update', $kontraktor->kontraktor_id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $kontraktor->nama) }}"
                        placeholder="Nama Kontraktor" required>
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="penanggung_jawab" class="form-control"
                        value="{{ old('penanggung_jawab', $kontraktor->penanggung_jawab) }}" placeholder="Penanggung Jawab"
                        required>
                </div>

                <div class="form-group col-md-6 mb-4">
                    <input type="text" name="kontak" class="form-control"
                        value="{{ old('kontak', $kontraktor->kontak) }}" placeholder="Kontak" required>
                </div>

                <div class="form-group col-md-6 mb-4">
                    <select name="proyek_id" class="form-control" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($dataProyek as $p)
                            <option value="{{ $p->proyek_id }}"
                                {{ old('proyek_id', $kontraktor->proyek_id) == $p->proyek_id ? 'selected' : '' }}>
                                {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12 mb-4">
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Kontraktor" required>{{ old('alamat', $kontraktor->alamat) }}</textarea>
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label class="fw-bold">Logo / Thumbnail</label>

                    <input type="file" name="logo" id="thumbnail" class="form-control" accept="image/*">

                    <small class="text-muted">JPG / PNG, max 5MB</small>

                    <!-- Preview Thumbnail -->
                    <div class="mt-2">
                        <img id="previewThumbnail" class="img-fluid rounded" style="max-height:150px;">
                    </div>
                </div>

                <!-- Upload Media -->
                <div class="form-group col-md-6 mb-4">
                    <label class="fw-bold">Media Tambahan</label>

                    <input type="file" name="media_files[]" id="media_files" class="form-control" multiple
                        accept="image/*,application/pdf">

                    <!-- Preview Media -->
                    <div id="previewMedia" class="mt-2 d-flex flex-wrap gap-2"></div>
                </div>



                <!-- BUTTON -->
                <div class="col-md-12 mt-4 d-flex gap-3 justify-content-center">
                    <button type="submit" class="btn-default d-flex gap-2">
                        <i data-feather="save"></i> Simpan Perubahan
                    </button>

                    <a href="{{ route('kontraktor.show', $kontraktor->kontraktor_id) }}"
                        class="btn-default bg-secondary text-white d-flex gap-2">
                        <i data-feather="arrow-left"></i> Kembali
                    </a>
                </div>

            </div>
        </form>
    </div>
    @include('layouts.guest.media-script')
@endsection
