@extends('layouts.guest.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Kontraktor</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Berikut Data Kontraktor Proyek
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Create -->
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center">

            <!-- SEARCH -->
            <form method="GET" class="d-flex align-items-center">
                <div class="search-box-group">
                    <input type="text" name="search" placeholder="Cari kontraktor..." value="{{ request('search') }}"
                        class="search-box-input">

                    <button type="submit" class="search-box-button">
                        <i class="fa fa-search"></i>
                    </button>

                    @if (request('search'))
                        <a href="{{ url()->current() }}" class="search-box-clear">
                            Clear
                        </a>
                    @endif
                </div>
            </form>

            <!-- CREATE -->
            <a href="{{ route('kontraktor.create') }}">
                <button type="button" class="btn-default">
                    <i class="fa-solid fa-plus me-2"></i> Tambah Kontraktor
                </button>
            </a>
        </div>
    </div>

    <!-- Cards Section -->
    <section>
        <div class="our-projects">
            <div class="light-bg-section">
                <div class="container-fluid">
                    <div class="row">

                        @forelse ($dataKontraktor as $kontraktor)
                            <div class="col-lg-3 col-md-6">
                                <div class="project-item wow fadeInUp" data-wow-delay="0.25s">

                                    {{-- IMAGE --}}
                                    <div class="project-image" data-cursor-text="View">
                                        <a href="{{ route('kontraktor.show', $kontraktor->kontraktor_id) }}">
                                            <figure>
                                                @if ($kontraktor->logo)
                                                    <img src="{{ asset('storage/' . $kontraktor->logo->file_name) }}"
                                                        alt="Logo {{ $kontraktor->nama }}">
                                                @else
                                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="No Logo">
                                                @endif
                                            </figure>
                                        </a>
                                    </div>


                                    {{-- BODY --}}
                                    <div class="project-body">
                                        <div class="project-body-title">
                                            <h3>{{ $kontraktor->nama }}</h3>
                                        </div>

                                        <div class="project-content">
                                            <p>
                                                <strong>Penanggung Jawab:</strong><br>
                                                {{ $kontraktor->penanggung_jawab }}
                                            </p>

                                            <p>
                                                <strong>Kontak:</strong><br>
                                                {{ $kontraktor->kontak }}
                                            </p>

                                            <div class="project-content-footer">
                                                <a href="{{ route('kontraktor.show', $kontraktor->kontraktor_id) }}"
                                                    class="readmore-btn">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p>Belum ada data kontraktor</p>
                            </div>
                        @endforelse

                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $dataKontraktor->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
