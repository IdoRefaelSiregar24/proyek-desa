@extends('layouts.guest.app')

@section('content')
    <!-- =================== HERO =================== -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Detail Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Informasi lengkap proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================== CONTAINER =================== -->
    <div class="container py-5">

        <!-- ------------- Informasi Umum Proyek ------------- -->
        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.2s">
            <div class="section-title">
                <h3>{{ $proyek->nama_proyek }}</h3>
                <h2 class="text-anime-style-3">Informasi Umum</h2>
            </div>

            <div class="row">

                @php
                    $fields = [
                        'Kode Proyek' => $proyek->kode_proyek,
                        'Nama Proyek' => $proyek->nama_proyek,
                        'Tahun' => $proyek->tahun,
                        'Lokasi' => $proyek->lokasi,
                        'Anggaran' => 'Rp ' . number_format($proyek->anggaran, 0, ',', '.'),
                        'Sumber Dana' => $proyek->sumber_dana,
                    ];
                @endphp

                @foreach ($fields as $label => $value)
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold">{{ $label }}</label>
                        <input type="text" class="form-control" value="{{ $value }}" disabled>
                    </div>
                @endforeach

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

                        <button class="btn-default d-inline-flex gap-2">
                            <i data-feather="trash-2"></i> Hapus Proyek
                        </button>
                    </form>

                </div>

            </div>
        </div>

        <!-- ------------- Tahapan Proyek ------------- -->
        <div class="contact-form wow fadeInUp mb-5" data-wow-delay="0.3s">

            <div class="section-title d-flex justify-content-between align-items-center">
                <div>
                    <h3>Tahapan Proyek</h3>
                    <h2 class="text-anime-style-3">Daftar Tahapan</h2>
                </div>

                <a href="{{ route('createTahapan', $proyek->proyek_id) }}"
                    class="btn-default d-flex align-items-center gap-2">
                    <i data-feather="plus-circle"></i> Tambah Tahapan
                </a>
            </div>

            @forelse ($proyek->tahapan as $t)
                <div class="border rounded p-4 mb-4 shadow-sm">

                    <div class="d-flex justify-content-between align-items-center">
                        <h5>{{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)</h5>

                        <div class="d-flex gap-2">

                            <!-- Tombol Edit -->
                            <a href="{{ route('tahapan-guest.edit', $t->tahap_id) }}"
                                class="btn btn-warning btn-sm text-white">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('tahapan-guest.destroy', $t->tahap_id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus tahapan ini? Semua progress terkait akan ikut terhapus!')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </div>


                    <div class="mt-2 mb-3">
                        <p><strong>Tanggal Mulai:</strong>
                            {{ $t->tgl_mulai ? date('d M Y', strtotime($t->tgl_mulai)) : '-' }}
                        </p>

                        <p><strong>Tanggal Selesai:</strong>
                            {{ $t->tgl_selesai ? date('d M Y', strtotime($t->tgl_selesai)) : '-' }}
                        </p>
                    </div>

                    <hr>

                    <!-- ----- Progress Per Tahap ----- -->
                    <h6 class="fw-bold mt-3">Progress Tahapan</h6>
                    <br>

                    @forelse ($t->progress as $p)
                        <div class="position-relative ps-4 mb-4">

                            <!-- Titik Timeline -->
                            <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle"
                                style="width:14px; height:14px;"></span>

                            <div class="card border-0 shadow-sm">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <h5 class="text-primary fw-bold">{{ $p->persen_real }}%</h5>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                                        </small>
                                    </div>

                                    <p class="mb-2">{{ $p->catatan }}</p>

                                    <!-- Tombol Aksi -->
                                    <div class="d-flex gap-2">

                                        <!-- Edit -->
                                        <a href="{{ route('progress-guest.edit', $p->progres_id) }}"
                                            class="btn btn-outline-primary btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>

                                        <!-- Hapus -->
                                        <form action="{{ route('progress-guest.destroy', $p->progres_id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus progress ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                    @empty
                        <p class="text-muted">Belum ada progress.</p>
                    @endempty

                    <a href="{{ route('createProgress', $proyek->proyek_id) }}"
                        class="btn btn-success btn-sm text-white mt-2">
                        + Tambah Progress
                    </a>


            </div>

        @empty
            <p class="text-center text-muted">Belum ada tahapan.</p>
        @endforelse

    </div>

</div>
@endsection
