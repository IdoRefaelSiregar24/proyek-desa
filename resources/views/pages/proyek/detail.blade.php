@extends('layouts.guest.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Detail Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Informasi lengkap proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="container py-5">

        <!-- Card: Informasi Proyek -->
        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.2s">
            <div class="section-title">
                <h3 class="wow fadeInUp">{{ $proyek->nama_proyek }}</h3>
                <h2 class="text-anime-style-3" data-cursor="-opaque">Informasi Umum</h2>
            </div>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label class="fw-bold">Kode Proyek</label>
                        <input type="text" class="form-control" value="{{ $proyek->kode_proyek }}" disabled>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Nama Proyek</label>
                    <input type="text" class="form-control" value="{{ $proyek->nama_proyek }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Tahun</label>
                    <input type="text" class="form-control" value="{{ $proyek->tahun }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Lokasi</label>
                    <input type="text" class="form-control" value="{{ $proyek->lokasi }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Anggaran</label>
                    <input type="text" class="form-control"
                        value="Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="fw-bold">Sumber Dana</label>
                    <input type="text" class="form-control" value="{{ $proyek->sumber_dana }}" disabled>
                </div>

                <div class="col-md-12 mb-4">
                    <label class="fw-bold">Deskripsi</label>
                    <textarea class="form-control" rows="4" disabled>{{ $proyek->deskripsi }}</textarea>
                </div>

                <div class="col-md-12 text-center mt-4">
                    <a href="{{ route('proyek-guest.edit', $proyek->proyek_id) }}" class="btn-default d-inline-flex gap-2">
                        <i data-feather="edit"></i> Edit Proyek
                    </a>

                    <form action="{{ route('proyek-guest.destroy', $proyek->proyek_id) }}" method="POST"
                        class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn-default bg-danger text-white border-0 d-inline-flex gap-2">
                            <i data-feather="trash-2"></i> Hapus Proyek
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Card: Tahapan -->
        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.3s">
            <div class="section-title d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="wow fadeInUp">Tahapan Proyek</h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque">Daftar Tahapan</h2>
                </div>

                <a href="{{ route('createTahapan', $proyek->proyek_id) }}"
                    class="btn-default d-flex align-items-center gap-2">
                    <i data-feather="plus-circle"></i> Tambah Tahapan
                </a>
            </div>

            @forelse ($proyek->tahapan as $t)
                <div class="border rounded p-4 mb-4">
                    <div class="d-flex justify-content-between">
                        <h5>{{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)</h5>

                        <a href="{{ route('tahapan-guest.edit', $t->tahap_id) }}"
                            class="btn btn-warning btn-sm text-white">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </div>

                    <!-- Informasi tambahan tahapan -->
                    <div class="mt-2 mb-3">
                        <p class="mb-1">
                            <strong>Tanggal Mulai:</strong>
                            {{ $t->tgl_mulai ? date('d M Y', strtotime($t->tgl_mulai)) : '-' }}
                        </p>
                        <p class="mb-1">
                            <strong>Tanggal Selesai:</strong>
                            {{ $t->tgl_selesai ? date('d M Y', strtotime($t->tgl_selesai)) : '-' }}
                        </p>
                    </div>

                    <hr>

                    <!-- Progress -->
                    <h6 class="fw-bold mt-3">Progress Tahapan</h6>

                    @forelse ($t->progress as $p)
                        <div class="position-relative ps-4 mb-4">

                            <!-- Titik Lingkaran Timeline -->
                            <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle"
                                style="width:14px; height:14px;"></span>

                            <div class="card border-0 shadow-sm">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <!-- Persentase -->
                                        <h5 class="mb-1 text-primary fw-bold">{{ $p->persen_real }}%</h5>

                                        <!-- Tanggal -->
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                                        </small>
                                    </div>

                                    <!-- Catatan -->
                                    <p class="mb-2">{{ $p->catatan }}</p>

                                    <a href=""
                                        class="btn btn-outline-primary btn-sm">
                                        Edit Progress
                                    </a>

                                </div>
                            </div>
                        </div>
                    @empty

                        <p class="text-muted">Belum ada progress.</p>

                        <a href="{{ route('createProgress', $t->tahap_id) }}"
                            class="btn btn-success btn-sm text-white">
                            + Tambah Progress
                        </a>
                    @endforelse



                </div>
            @empty
                <p class="text-center text-muted">Belum ada tahapan.</p>
            @endforelse
        </div>


    </div>
@endsection
