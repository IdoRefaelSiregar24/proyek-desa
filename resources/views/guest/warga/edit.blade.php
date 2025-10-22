@extends('guest.layouts.app')

@section('content')
    <!-- Start Hero Section -->
    <section class="hero bg-section parallaxie position-relative d-flex align-items-center justify-content-center"
        style="min-height: 90vh;">
        <!-- Overlay Gelap -->
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>

        <!-- Kontainer Utama -->
        <div class="container position-relative text-center text-white py-5">
            <h1 class="fw-bold text-white display-5 mb-3">Profil Warga</h1>
            <p class="lead mb-5 text-light">Informasi data diri warga Desa Balam Sempurna</p>

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 col-12">
                    <div class="card shadow-lg border-0 rounded-4 bg-white text-dark">
                        <div class="card-body bg-white p-5">
                            <form action="{{ route('warga.update', $warga->user_id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">No. KTP</label>
                                        <input type="text" name="no_ktp" class="form-control"
                                            value="{{ old('no_ktp', $warga->no_ktp ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ old('nama', $warga->nama ?? $user->name) }}" required>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select" required>
                                            <option value="L"
                                                {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P"
                                                {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Agama</label>
                                        <input type="text" name="agama" class="form-control"
                                            value="{{ old('agama', $warga->agama ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control"
                                            value="{{ old('pekerjaan', $warga->pekerjaan ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">No. Telepon</label>
                                        <input type="text" name="telp" class="form-control"
                                            value="{{ old('telp', $warga->telp ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $warga->email ?? $user->email) }}" required>
                                    </div>
                                </div>

                                <div class="row text-start">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('warga.index') }}"
                                            class="btn btn-outline-secondary px-4 py-2">Batal</a>
                                        <button type="submit" class="btn btn-success px-4 py-2">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
