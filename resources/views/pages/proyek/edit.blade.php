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

    <!-- Proyek Form start -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
        <div class="section-title">
            <h3 class="wow fadeInUp">Desa Balam Sempurna</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Proyek Desa</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('proyek-guest.update', $proyek->proyek_id) }}" method="POST" novalidate>
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

                <div class="col-md-12 mt-4 d-flex gap-3 justify-content-center">

                    <form action="{{ route('proyek-guest.update', $proyek->proyek_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn-default d-flex align-items-center gap-2">
                            <i data-feather="save"></i> Perbarui Proyek
                        </button>
                    </form>

                    <a href="{{ route('listTahapan', $proyek->proyek_id) }}"
                        class="btn-default bg-danger text-white border-0 d-flex align-items-center gap-2">
                        <i data-feather="plus-circle"></i>
                        Lihat Tahapan Proyek
                    </a>


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



@endsection
