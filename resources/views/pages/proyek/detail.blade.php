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
            </div>

            <div class="section-title d-flex flex-wrap justify-content-between align-items-center gap-3">
                <a href="{{ route('createTahapan', $proyek->proyek_id) }}"
                    class="btn-default d-flex align-items-center gap-2 order-3 order-md-2">
                    <i data-feather="plus-circle"></i> Tambah Tahapan
                </a>

                <!-- SEARCH -->
                <form method="GET" action="" class="d-flex flex-wrap align-items-center gap-2 order-2 order-md-3">
                    <div class="search-box-group d-flex align-items-center">
                        <input type="text" name="search" placeholder="Cari proyek..." value="{{ request('search') }}"
                            class="search-box-input">
                        <button type="submit" class="search-box-button">
                            <i class="fa fa-search"></i>
                        </button>

                        @if (request('search'))
                            <a href="{{ url()->current() }}?{{ http_build_query(request()->except('search')) }}"
                                class="search-box-clear">Clear</a>
                        @endif
                    </div>

                    @if (request('sumber_dana'))
                        <input type="hidden" name="sumber_dana" value="{{ request('sumber_dana') }}">
                    @endif
                    @if (request('tahun'))
                        <input type="hidden" name="tahun" value="{{ request('tahun') }}">
                    @endif
                </form>

                <!-- FILTER -->
                <form method="GET" action="" class="d-flex flex-wrap gap-2 order-4 w-100 w-md-auto">
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <select name="sumber_dana" class="select-default w-auto" onchange="this.form.submit()">
                        <option value="">Sumber Dana</option>
                        <option value="APBN" {{ request('sumber_dana') == 'APBN' ? 'selected' : '' }}>APBN</option>
                        <option value="APBD" {{ request('sumber_dana') == 'APBD' ? 'selected' : '' }}>APBD</option>
                        <option value="Swasta" {{ request('sumber_dana') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                        <option value="Hibah" {{ request('sumber_dana') == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>

                    <select name="tahun" class="select-default w-auto" onchange="this.form.submit()">
                        <option value="">Tahun</option>
                        {{-- Loop tahun --}}
                    </select>
                </form>
            </div>

            {{-- LIST TAHAPAN --}}
            @forelse ($tahapan as $t)
                <div id="progress-container-{{ $t->tahap_id }}">
                    @include('pages.proyek.progress-item', ['t' => $t])
                </div>
            @empty
                <p class="text-center text-muted">Belum ada tahapan.</p>
            @endforelse

            {{-- PAGINATION TAHAPAN --}}
            <div class="d-flex justify-content-center">
                {{ $tahapan->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- AJAX script untuk load progress per tahapan -->
    <script>
        function loadProgress(tahapId, page = 1) {
            fetch(`/tahapan/${tahapId}/progress?page=` + page, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                const container = document.getElementById('progress-container-' + tahapId);
                if (container) container.innerHTML = html;
            })
            .catch(err => {
                console.error('Failed to load progress:', err);
            });
        }
    </script>
@endsection
