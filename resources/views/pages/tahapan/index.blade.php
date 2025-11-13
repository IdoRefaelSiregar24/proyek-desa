@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Tahapan Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ $proyek->nama_proyek }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Tahapan List Section -->
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Daftar Tahapan Proyek: {{ $proyek->nama_proyek }}</h3>

            <div class="d-flex gap-2">
                <!-- Tombol Tambah Tahapan -->
                <a href="{{ route('createTahapan', $proyek->proyek_id) }}"
                    class="btn-default bg-danger text-white border-0 d-flex align-items-center gap-1 px-3 py-3">
                    <i data-feather="plus-circle"></i> Tambah Tahapan
                </a>

                <!-- Tombol Export (contoh tombol kedua) -->
                <a href="{{ route('proyek-guest.index', $proyek->proyek_id) }}"
                    class="btn-default bg-primary text-white border-0 d-flex align-items-center gap-1 px-3 py-3">
                    <i data-feather="see"></i> Lihat Proyek
                </a>
            </div>
        </div>


        @if ($tahapan->count() > 0)
            <div class="row">
                @foreach ($tahapan as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 rounded-3 h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-semibold">{{ $item->nama_tahap }}</h5>
                                <p class="text-muted mb-2">
                                    <strong>Target:</strong> {{ $item->target_persen }}%
                                </p>
                                <p class="text-muted mb-2">
                                    <i data-feather="calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d M Y') }}
                                    – {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d M Y') }}
                                </p>

                                <div class="d-flex gap-2 mt-auto">
                                    <a href="{{ route('tahapan-guest.edit', $item->tahap_id) }}"
                                        class="btn-default d-flex align-items-center gap-1 px-3 py-1">
                                        <i data-feather="edit"></i> EDIT
                                    </a>

                                    <form action="{{ route('tahapan-guest.destroy', $item->tahap_id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus tahapan ini?')">
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
                Belum ada tahapan proyek yang ditambahkan.
            </div>
        @endif
    </div>
@endsection
