@extends('layouts.guest.app')

@section('content')
    <!-- HERO -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Detail User & Data Warga</h1>
                            <p class="mt-2">
                                Informasi akun pengguna dan data kependudukan yang terdaftar
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <section class="py-5">
        <div class="container">

            <div class="row g-4">

                <!-- USER CARD -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-danger text-white d-flex align-items-center">
                            <i class="fa fa-user me-2"></i>
                            <span class="fw-semibold">Informasi Akun User</span>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm table-borderless align-middle mb-0">
                                <tr>
                                    <th class="text-muted" width="40%">Nama User</th>
                                    <td class="fw-semibold">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Role</th>
                                    <td>
                                        <span class="badge bg-primary px-3 py-1">
                                            {{ strtoupper($user->role) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">ID User</th>
                                    <td>#{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Tanggal Dibuat</th>
                                    <td>{{ $user->created_at->translatedFormat('d F Y') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- WARGA CARD -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-warning text-white d-flex align-items-center">
                            <i class="fa fa-id-card me-2"></i>
                            <span class="fw-semibold">Data Kependudukan (Warga)</span>
                        </div>

                        <div class="card-body">
                            @if ($user->warga)
                                <table class="table table-sm table-borderless align-middle mb-0">
                                    <tr>
                                        <th class="text-muted" width="40%">No. KTP</th>
                                        <td class="fw-semibold">{{ $user->warga->no_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Nama Lengkap</th>
                                        <td>{{ $user->warga->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Jenis Kelamin</th>
                                        <td>
                                            <span class="badge bg-info text-dark px-3 py-1">
                                                {{ ucfirst($user->warga->jenis_kelamin) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Agama</th>
                                        <td>{{ $user->warga->agama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Pekerjaan</th>
                                        <td>{{ $user->warga->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">No. Telepon</th>
                                        <td>{{ $user->warga->telp ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Email</th>
                                        <td>{{ $user->warga->email ?? '-' }}</td>
                                    </tr>
                                </table>
                            @else
                                <div class="alert alert-warning d-flex align-items-center mb-0">
                                    <i class="fa fa-info-circle me-2"></i>
                                    Data warga belum terhubung dengan akun ini
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <!-- ACTION -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left me-1"></i> Kembali
                </a>

                <div class="d-flex gap-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-dark">
                        <i class="fa fa-pen me-1"></i> Edit
                    </a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus user dan data warga ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash me-1"></i> Hapus Akun dan Data Warga  
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
