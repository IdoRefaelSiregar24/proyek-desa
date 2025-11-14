@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Progres Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ $proyek->nama_proyek }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Progress List Section -->
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Daftar Progres Proyek: {{ $proyek->nama_proyek }}</h3>

            <div class="d-flex gap-2">
                <!-- Tombol Tambah Progres -->
                <a href="{{ route('progress-guest.create', $proyek->proyek_id) }}"
                    class="btn-default bg-danger text-white border-0 d-flex align-items-center gap-1 px-3 py-3">
                    <i data-feather="plus-circle"></i> Tambah Progres
                </a>

                <!-- Tombol Kembali -->
                <a href="{{ route('listTahapan', $proyek->proyek_id) }}"
                    class="btn-default bg-primary text-white border-0 d-flex align-items-center gap-1 px-3 py-3">
                    <i data-feather="arrow-left"></i> Lihat Tahapan Proyek
                </a>

                <!-- Tombol Kembali -->
                <a href="{{ route('proyek-guest.index', $proyek->proyek_id) }}"
                    class="btn-default bg-primary text-white border-0 d-flex align-items-center gap-1 px-3 py-3">
                    <i data-feather="arrow-left"></i> Lihat Proyek
                </a>
            </div>
        </div>

        @if ($progress->count() > 0)
            <div class="row">
                @foreach ($progress as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 rounded-3 h-100">

                            <!-- Foto progres -->
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center"
                                    style="height: 200px; border-radius: 6px;">
                                    <span class="text-muted">Tidak ada foto</span>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                <!-- Persen -->
                                <h5 class="fw-semibold">Progress: {{ $item->persen_real }}%</h5>

                                <!-- Tanggal -->
                                <p class="text-muted mb-2">
                                    <i data-feather="calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </p>

                                <!-- Catatan -->
                                <p class="text-muted">
                                    <strong>Catatan:</strong><br>
                                    {{ $item->catatan ?: '-' }}
                                </p>

                                <!-- Tombol Edit & Hapus -->
                                <div class="d-flex gap-2 mt-auto">
                                    <a href="{{ route('progress-guest.edit', $item->progres_id) }}"
                                        class="btn-default d-flex align-items-center gap-1 px-3 py-1">
                                        <i data-feather="edit"></i> EDIT
                                    </a>

                                    <form action="{{ route('progress-guest.destroy', $item->progres_id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus progres ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn-default d-flex align-items-center gap-1 px-3 py-1">
                                            <i data-feather="trash-2"></i> HAPUS
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                Belum ada progres proyek yang ditambahkan.
            </div>
        @endif
    </div>
@endsection
