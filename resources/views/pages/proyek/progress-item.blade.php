<div class="border rounded p-4 mb-4 shadow-sm">

    <!-- Header Tahapan -->
    <div class="d-flex justify-content-between align-items-center">
        <h5>{{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)</h5>

        <div class="d-flex gap-2">

            <!-- Tombol Edit -->
            <a href="{{ route('tahapan-guest.edit', $t->tahap_id) }}" class="btn btn-warning btn-sm text-white">
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

    <!-- Informasi Tanggal -->
    <div class="mt-2 mb-3">
        <p><strong>Tanggal Mulai:</strong>
            {{ $t->tgl_mulai ? date('d M Y', strtotime($t->tgl_mulai)) : '-' }}
        </p>

        <p><strong>Tanggal Selesai:</strong>
            {{ $t->tgl_selesai ? date('d M Y', strtotime($t->tgl_selesai)) : '-' }}
        </p>
    </div>

    <hr>

    <!-- ----- Progress Per Tahapan ----- -->
    <div class="section-title d-flex justify-content-between align-items-center">
        <div>
            <h2 class="text-anime-style-4">Progress Tahapan</h2>
            <br>
            <h3>Progress Per Tahapan</h3>
        </div>

    </div>

    <div class="section-title d-flex flex-wrap justify-content-between align-items-center gap-3">
        <form method="GET" action="" class="d-flex flex-wrap align-items-center gap-2">

            <!-- Search Progress -->
            <div class="search-box-group d-flex align-items-center">
                <input type="text" name="search_progress" placeholder="Cari Progress..."
                    value="{{ request('search_progress') }}" class="search-box-input">
                <button type="submit" class="search-box-button">
                    <i class="fa fa-search"></i>
                </button>
                @if (request('search_progress'))
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('search_progress')) }}"
                        class="search-box-clear">Clear</a>
                @endif
            </div>

            <!-- Filter Tanggal -->
            <input type="date" name="tgl_mulai" value="{{ request('tgl_mulai') }}" class="form-control"
                placeholder="Tanggal Mulai">
            <input type="date" name="tgl_selesai" value="{{ request('tgl_selesai') }}" class="form-control"
                placeholder="Tanggal Selesai">

            <!-- Filter Persen Real -->
            <input type="number" name="persen_min" value="{{ request('persen_min') }}" class="form-control"
                placeholder="Persen Min" min="0" max="100">
            <input type="number" name="persen_max" value="{{ request('persen_max') }}" class="form-control"
                placeholder="Persen Max" min="0" max="100">

            <!-- Submit -->
            <button type="submit" class="btn btn-danger">Filter</button>

            <!-- Clear -->
            @if (request()->except('page'))
                <a href="{{ url()->current() }}" class="btn btn-secondary">Clear</a>
            @endif

        </form>
    </div>
    <br>
    @php
        $progressPaginated = $t
            ->progress()
            ->filter(request())
            ->orderBy('tanggal', 'desc')
            ->paginate(3, ['*'], 'page')
            ->withQueryString();
    @endphp

    @forelse ($progressPaginated as $p)
        <div class="position-relative ps-4 mb-4">

            <!-- Titik Timeline -->
            <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle"
                style="width:14px; height:14px;"></span>

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <!-- Header Progress -->
                    <div class="d-flex justify-content-between">
                        <h5 class="text-primary fw-bold">{{ $p->persen_real }}%</h5>
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                        </small>
                    </div>

                    <p class="mb-2">{{ $p->catatan }}</p>

                    <!-- Tombol Aksi Progress -->
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
    @endforelse


    <!-- Pagination -->
    <div class="d-flex justify-content-center gap-1">
        @for ($i = 1; $i <= $progressPaginated->lastPage(); $i++)
            <button onclick="loadProgress({{ $t->tahap_id }}, {{ $i }})"
                class="btn btn-sm {{ $i == $progressPaginated->currentPage() ? 'btn-primary' : 'btn-light' }}">
                {{ $i }}
            </button>
        @endfor

    </div>

    <!-- Tambah Progress -->
    <button class="btn btn-success btn-sm text-white mt-2"
        onclick="window.location.href='{{ route('createProgress', $t->tahap_id) }}'">
        + Tambah Progress
    </button>

</div>
