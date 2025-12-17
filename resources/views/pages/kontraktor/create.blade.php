@extends('layouts.guest.app') @section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Tambah Kontraktor</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s"> Tambahkan data kontraktor proyek </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Kontraktor -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Form Kontraktor</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger shadow-sm">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <form action="{{ route('kontraktor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <!-- Nama Kontraktor -->
                <div class="form-group col-md-6 mb-4"> <input type="text" name="nama" class="form-control"
                        placeholder="Nama Kontraktor" value="{{ old('nama') }}" required> @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Penanggung Jawab -->
                <div class="form-group col-md-6 mb-4"> <input type="text" name="penanggung_jawab" class="form-control"
                        placeholder="Penanggung Jawab" value="{{ old('penanggung_jawab') }}" required>
                    @error('penanggung_jawab')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Kontak -->
                <div class="form-group col-md-6 mb-4"> <input type="text" name="kontak" class="form-control"
                        placeholder="Kontak (No HP / Email)" value="{{ old('kontak') }}" required> @error('kontak')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Proyek (karena struktur kamu pakai proyek_id) -->
                <div class="form-group col-md-6 mb-4"> <select name="proyek_id" class="form-control" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($dataProyek as $proyek)
                            <option value="{{ $proyek->proyek_id }}"
                                {{ old('proyek_id') == $proyek->proyek_id ? 'selected' : '' }}> {{ $proyek->nama_proyek }}
                            </option>
                        @endforeach
                    </select> @error('proyek_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Alamat -->
                <div class="form-group col-md-12 mb-5">
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Kontraktor" required>{{ old('alamat') }}</textarea> @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- LOGO KONTRAKTOR -->
                <div class="form-group col-md-6 mb-4">
                    <label class="fw-bold">Logo Kontraktor</label>
                    <input type="file" name="logo" class="form-control" accept="image/*" required>
                    <small class="text-muted">
                        JPG / PNG, max 5MB
                    </small>
                </div>

                <!-- MEDIA LAIN -->
                <div class="form-group col-md-6 mb-4">
                    <label class="fw-bold">Media Pendukung</label>
                    <input type="file" name="media_files[]" class="form-control" multiple
                        accept="image/*,application/pdf">
                    <small class="text-muted">
                        Foto kantor, sertifikat, dll
                    </small>
                </div>
                <!-- Submit -->
                <div class="col-md-12"> <button type="submit" class="btn-default"> <i class="fa-solid fa-plus me-2"></i>
                        Simpan Kontraktor </button> </div>
            </div>
        </form>
    </div>
@endsection
