@extends('guest.layouts.app')

@section('content')
    <section class="hero bg-section parallaxie position-relative d-flex align-items-center justify-content-center"
        style="min-height: 100vh;">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>

        <div class="container position-relative text-center text-white py-5">
            <h1 class="fw-bold text-white display-5 mb-3">Isi Data Diri Warga</h1>
            <p class="lead mb-5 text-light">Lengkapi data diri Anda untuk keperluan administrasi Desa Balam Sempurna</p>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="card shadow-lg border-0 rounded-4 bg-white text-dark">
                        <div class="card-body p-5">

                            <h4 class="fw-bold text-success mb-4 text-center">Formulir Data Warga</h4>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Terjadi kesalahan!</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('warga.store') }}" method="POST" novalidate>
                                @csrf

                                <div class="row text-start">

                                    {{-- NIK / No KTP --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
                                        <input type="text" name="no_ktp"
                                            class="form-control @error('no_ktp') is-invalid @enderror"
                                            placeholder="Masukkan NIK Anda" value="{{ old('no_ktp') }}" required>
                                        @error('no_ktp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Nama Lengkap --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Nama Lengkap</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', Auth::user()->name) }}"
                                            placeholder="Masukkan nama lengkap Anda">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Tempat Lahir --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Tempat Lahir <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="tempat_lahir"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            placeholder="Contoh: Pekanbaru" value="{{ old('tempat_lahir') }}" required>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Tanggal Lahir --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Tanggal Lahir <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_lahir"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir') }}" required>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Jenis Kelamin --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Jenis Kelamin <span
                                                class="text-danger">*</span></label>
                                        <select name="jenis_kelamin"
                                            class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                            <option value="" selected disabled>Pilih jenis kelamin</option>
                                            <option value="L"
                                                {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Nomor Telepon --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Nomor Telepon</label>
                                        <input type="text" name="telp"
                                            class="form-control @error('telp') is-invalid @enderror"
                                            placeholder="Contoh: 08123456789" value="{{ old('telp') }}">
                                        @error('telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Agama --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Agama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="agama"
                                            class="form-control @error('agama') is-invalid @enderror"
                                            placeholder="Masukkan agama Anda" value="{{ old('agama') }}" required>
                                        @error('agama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Pekerjaan --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold">Pekerjaan</label>
                                        <input type="text" name="pekerjaan"
                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                            placeholder="Contoh: Guru, Wirausaha, Petani" value="{{ old('pekerjaan') }}">
                                        @error('pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                            placeholder="{{ old('email', Auth::user()->email) }}" value="{{ old('email', Auth::user()->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success fw-semibold px-5 py-2">
                                        <i class="bi bi-save2"></i> Simpan Data
                                    </button>
                                    <a href="{{ route('warga.index') }}"
                                        class="btn btn-outline-secondary fw-semibold px-4 py-2 ms-2">
                                        <i class="bi bi-arrow-left-circle"></i> Batal
                                    </a>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
