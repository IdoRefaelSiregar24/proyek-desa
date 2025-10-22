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

                            {{-- ✅ Alert Sukses --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            {{-- ⚠️ Alert Error Validasi --}}
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
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
                                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                            placeholder="Masukkan NIK Anda" value="{{ old('nik') }}" required>
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ Auth::user()->name }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            placeholder="Contoh: Pekanbaru" value="{{ old('tempat_lahir') }}" required>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir') }}" required>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                            <option value="" selected disabled>Pilih jenis kelamin</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Nomor Telepon</label>
                                        <input type="text" name="no_telepon" class="form-control"
                                            placeholder="Contoh: 08123456789" value="{{ old('no_telepon') }}">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                                        <textarea name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror"
                                            placeholder="Masukkan alamat lengkap Anda" required>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-semibold">RT / RW</label>
                                        <input type="text" name="rt_rw" class="form-control" placeholder="Contoh: 03 / 04"
                                            value="{{ old('rt_rw') }}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-semibold">Desa / Kelurahan</label>
                                        <input type="text" name="desa_kelurahan" class="form-control"
                                            placeholder="Masukkan nama desa / kelurahan" value="{{ old('desa_kelurahan') }}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-semibold">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control"
                                            placeholder="Masukkan kecamatan" value="{{ old('kecamatan') }}">
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control"
                                            placeholder="Contoh: Petani, Guru, Wirausaha" value="{{ old('pekerjaan') }}">
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success fw-semibold px-5 py-2">
                                        <i class="bi bi-save2"></i> Simpan Data
                                    </button>
                                    <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary fw-semibold px-4 py-2 ms-2">
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
