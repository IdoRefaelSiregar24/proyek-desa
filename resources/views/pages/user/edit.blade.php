@extends('layouts.guest.app')

@section('content')
    <!-- HERO -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Edit User & Data Warga</h1>
                            <p class="mt-2">
                                Perbarui informasi akun dan data kependudukan pengguna
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM -->
    <section class="py-5">
        <div class="container">
            {{-- PESAN ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <strong><i class="fa fa-exclamation-circle me-1"></i> Terjadi Kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- USER -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-danger text-white">
                                <i class="fa fa-user me-2"></i> Edit Akun User
                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama User</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Role</label>
                                    <select name="role" class="form-select">
                                        <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>
                                            super_admin
                                        </option>
                                        <option value="admin_proyek" {{ $user->role == 'admin_proyek' ? 'selected' : '' }}>
                                            admin_proyek
                                        </option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                            User
                                        </option>
                                    </select>
                                </div>

                                <div class="alert alert-light border small mb-0">
                                    <i class="fa fa-info-circle me-1"></i>
                                    ID User: <strong>#{{ $user->id }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- WARGA -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-warning text-dark">
                                <i class="fa fa-id-card me-2"></i> Edit Data Warga
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">No KTP</label>
                                    <input type="text" name="no_ktp" class="form-control"
                                        value="{{ old('no_ktp', $user->warga->no_ktp ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ old('nama', $user->warga->nama ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="">-- Pilih --</option>
                                        <option value="laki-laki"
                                            {{ ($user->warga->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="perempuan"
                                            {{ ($user->warga->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Agama</label>
                                    <input type="text" name="agama" class="form-control"
                                        value="{{ old('agama', $user->warga->agama ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control"
                                        value="{{ old('pekerjaan', $user->warga->pekerjaan ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">No Telepon</label>
                                    <input type="text" name="telp" class="form-control"
                                        value="{{ old('telp', $user->warga->telp ?? '') }}">
                                </div>

                                <div class="mb-0">
                                    <label class="form-label fw-semibold">Email Warga</label>
                                    <input type="email" name="email_warga" class="form-control"
                                        value="{{ old('email_warga', $user->warga->email ?? '') }}">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- ACTION -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Batal
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        <i class="fa fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </section>
@endsection
