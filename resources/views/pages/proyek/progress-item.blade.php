<div class="border rounded p-4 mb-4 shadow-sm">

    <!-- Header Tahapan -->
    <div class="d-flex justify-content-between align-items-center">
        <h5>{{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)</h5>

        <div class="d-flex gap-2">

            @if (auth()->user()->role !== 'user')
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
        @endif

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
    <h2 class="text-anime-style-4 mb-3">Media Tahapan</h2>
    <p class="text-muted mb-4">Lihat semua media terkait tahapan <strong>{{ $t->nama_tahap }}</strong> di bawah ini.</p>

    <div class="tahapan-media">

        @php
            $medias = $t->medias ?? collect();
            $thumbnail = $medias->firstWhere('sort_order', 0);
            $otherMedia = $medias->where('sort_order', '>', 0);
        @endphp

        <!-- Thumbnail Utama -->
        @if ($thumbnail)
            <div class="mb-4 text-center">
                <div class="card shadow-sm rounded overflow-hidden">
                    <a href="{{ asset('storage/' . $thumbnail->file_name) }}" class="glightbox"
                        data-gallery="tahapan-{{ $t->tahap_id }}">
                        <img src="{{ asset('storage/' . $thumbnail->file_name) }}" alt="Thumbnail {{ $t->nama_tahap }}"
                            class="img-fluid" style="max-height:300px; width:100%; object-fit:cover;">
                    </a>
                </div>
            </div>
        @endif

        <!-- Media Lainnya (Grid) -->
        @if ($otherMedia->count() > 0)
            <div class="row g-3">
                @foreach ($otherMedia as $media)
                    @php $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION)); @endphp
                    <div class="col-6 col-md-3">
                        @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                            <div class="card shadow-sm rounded overflow-hidden hover-scale">
                                <a href="{{ asset('storage/' . $media->file_name) }}" class="glightbox"
                                    data-gallery="tahapan-{{ $t->tahap_id }}">
                                    <img src="{{ asset('storage/' . $media->file_name) }}" class="img-fluid"
                                        style="height:150px; width:100%; object-fit:cover;">
                                </a>
                            </div>
                        @elseif($ext === 'pdf')
                            <div class="card border rounded shadow-sm text-center p-3 bg-light">
                                <i class="fa-solid fa-file-pdf fa-2x text-danger mb-2"></i>
                                <div class="text-truncate" style="max-width: 100%;" title="{{ $media->file_name }}">
                                    <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank">
                                        {{ $media->file_name }}
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="card border rounded shadow-sm text-center p-3 bg-light">
                                <i class="fa-solid fa-file fa-2x mb-2"></i>
                                <div>{{ $media->file_name }}</div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        @if ($medias->count() === 0)
            <p class="text-center text-muted mt-3">Belum ada media untuk tahapan ini.</p>
        @endif
    </div>

    <!-- CSS tambahan untuk efek hover -->
    <style>
        .hover-scale:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>

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
            <input type="date" name="progress_mulai" value="{{ request('progress_mulai') }}" class="form-control">
            <input type="date" name="progress_selesai" value="{{ request('progress_selesai') }}"
                class="form-control">

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

            <div class="card shadow-sm border-0 mb-4 rounded-4 overflow-hidden">
                {{-- ====================== HEADER ====================== --}}
                <div class="d-flex justify-content-between align-items-center px-3 py-3 bg-light border-bottom">
                    <div>
                        <h6 class="fw-semibold mb-0">
                            {{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d F Y') }}</h6>
                        <small class="text-muted">Update Progress Pekerjaan</small>
                    </div>
                    <span class="badge bg-primary rounded-pill fs-5 px-3 py-2 shadow">
                        {{ $p->persen_real }}%
                    </span>
                </div>

                <div class="card-body pb-3">

                    <p class="mb-3 text-secondary" style="font-size: 15px; line-height:1.5;">
                        {{ $p->catatan }}
                    </p>

                    @php
                        $medias = $p->medias;
                        $thumbnail = $medias->first();
                        $otherMedia = $medias->skip(1);
                    @endphp

                    {{-- ============ THUMBNAIL UTAMA ============ --}}
                    @if ($thumbnail)
                        <div class="text-center mb-4">
                            <a href="{{ asset('storage/' . $thumbnail->file_name) }}" class="glightbox"
                                data-gallery="progress-{{ $p->progres_id }}">
                                <img src="{{ asset('storage/' . $thumbnail->file_name) }}"
                                    class="rounded-4 shadow-sm border"
                                    style="max-height:330px;width:100%;object-fit:cover;">
                            </a>
                        </div>
                    @endif


                    {{-- ============ MEDIA LAIN - GRID ============ --}}
                    @if ($otherMedia->count() > 0)
                        <h6 class="fw-semibold mb-2 text-dark">Dokumentasi Lainnya</h6>
                        <div class="row g-3 mb-3">

                            @foreach ($otherMedia as $media)
                                @php $ext = strtolower(pathinfo($media->file_name, PATHINFO_EXTENSION)); @endphp

                                <div class="col-4 col-md-2">
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <a href="{{ asset('storage/' . $media->file_name) }}" class="glightbox"
                                            data-gallery="progress-{{ $p->progres_id }}">
                                            <img src="{{ asset('storage/' . $media->file_name) }}"
                                                class="rounded shadow-sm border"
                                                style="height:95px;width:100%;object-fit:cover;">
                                        </a>
                                    @elseif($ext == 'pdf')
                                        <div class="bg-light border rounded text-center py-3 shadow-sm">
                                            <i class="fa-regular fa-file-pdf text-danger fs-3"></i>
                                            <a class="d-block mt-1 fw-semibold small"
                                                href="{{ asset('storage/' . $media->file_name) }}"
                                                target="_blank">Lihat PDF</a>
                                        </div>
                                    @else
                                        <div class="p-2 small bg-light rounded border shadow-sm text-center">
                                            <i class="fa-regular fa-file fs-4"></i>
                                            <p class="small text-truncate mt-1">{{ $media->file_name }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    @endif

                    @if ($medias->count() == 0)
                        <p class="text-center text-muted">Belum ada dokumentasi media untuk progres ini.</p>
                    @endif

                </div>

                {{-- ===================== FOOTER ACTION ===================== --}}
                @if (auth()->user()->role !== 'user')
                <div class="border-top bg-white px-3 py-2 d-flex justify-content-end gap-2">
                    <a href="{{ route('progress-guest.edit', $p->progres_id) }}"
                        class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a>

                    <form action="{{ route('progress-guest.destroy', $p->progres_id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus progress ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
                @endif
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
    @if (auth()->user()->role !== 'user')
    <button class="btn btn-success btn-sm text-white mt-2"
        onclick="window.location.href='{{ route('progress-guest.show', $proyek->proyek_id) }}'">
        + Tambah Progress
    </button>
    @endif


</div>
