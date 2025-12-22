@extends('layouts.guest.app')

@section('content')
    <!-- HERO -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Tambah User & Data Warga</h1>
                            <p class="mt-2">
                                Input akun pengguna baru beserta data kependudukan
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
            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ERROR VALIDATION MESSAGE --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-triangle me-1"></i>
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="row g-4">

                    <!-- USER -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-danger text-white">
                                <i class="fa fa-user me-2"></i> Data Akun User
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama User</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">-- Pilih Role --</option>
                                        <option value="super_admin">Super Admin</option>
                                        <option value="admin_proyek">Admin Proyek</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>

                                <div class="alert alert-light border small mb-0">
                                    <i class="fa fa-info-circle me-1"></i>
                                    Password minimal 6 karakter
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- WARGA -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-warning text-dark">
                                <i class="fa fa-id-card me-2"></i> Data Warga (Opsional)
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">No KTP</label>
                                    <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="">-- Pilih --</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Agama</label>
                                    <input type="text" name="agama" class="form-control" value="{{ old('agama') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control"
                                        value="{{ old('pekerjaan') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">No Telepon</label>
                                    <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
                                </div>

                                <div class="mb-0">
                                    <label class="form-label fw-semibold">Email Warga</label>
                                    <input type="email" name="email_warga" class="form-control"
                                        value="{{ old('email_warga') }}">
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
                        <i class="fa fa-save me-1"></i> Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </section>
@endsection
