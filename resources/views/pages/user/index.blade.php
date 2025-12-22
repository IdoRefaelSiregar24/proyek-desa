@extends('layouts.guest.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">
                                Daftar User & Warga
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Informasi pengguna beserta data warga terkait
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fa fa-check-circle fa-lg me-2"></i>
                    <strong>Berhasil!</strong>&nbsp;{{ session('success') }}
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif


    <!-- Search -->
    <div class="container py-4">
        <form method="GET" class="d-flex justify-content-between align-items-center">
            <div class="search-box-group">
                <input type="text" name="search" placeholder="Cari nama user / NIK..." value="{{ request('search') }}"
                    class="search-box-input">
                <button type="submit" class="search-box-button">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <a href="{{ route('users.create') }}" class="btn-default">
                <i class="fa fa-plus me-2"></i> Tambah User
            </a>
        </form>
    </div>

    <!-- Start User Cards -->
    <section>
        <div class="container py-4">

            <div class="card border-0 shadow">
                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead style="background-color:#1f2937;" class="text-white">
                                <tr class="text-uppercase small">
                                    <th width="5%" class="text-center">No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>No KTP</th>
                                    <th>No Telp</th>
                                    <th width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($dataUser as $index => $user)
                                    <tr>
                                        <!-- NO -->
                                        <td class="text-center fw-bold text-dark">
                                            {{ $dataUser->firstItem() + $index }}
                                        </td>

                                        <!-- NAMA -->
                                        <td>
                                            <div class="fw-bold text-dark">
                                                {{ $user->name }}
                                            </div>
                                            <small class="text-muted">
                                                ID User: {{ $user->id }}
                                            </small>
                                        </td>

                                        <!-- EMAIL -->
                                        <td class="text-dark">
                                            {{ $user->email }}
                                        </td>

                                        <!-- ROLE -->
                                        <td>
                                            @php
                                                $roleColor = match ($user->role) {
                                                    'admin' => 'bg-danger',
                                                    'operator' => 'bg-warning text-dark',
                                                    default => 'bg-primary',
                                                };
                                            @endphp

                                            <span class="badge {{ $roleColor }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>

                                        <!-- NO KTP -->
                                        <td>
                                            @if ($user->warga && $user->warga->no_ktp)
                                                <span class="badge bg-success">
                                                    {{ $user->warga->no_ktp }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Belum Ada
                                                </span>
                                            @endif
                                        </td>

                                        <!-- NO TELP -->
                                        <td class="text-dark">
                                            {{ $user->warga->telp ?? '-' }}
                                        </td>

                                        <!-- AKSI -->
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"
                                                    title="Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-warning text-dark" title="Edit">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5 text-muted">
                                            Belum ada data user
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $dataUser->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </section>

    <!-- End User Cards -->
@endsection
