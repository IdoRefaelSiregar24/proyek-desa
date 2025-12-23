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
                                Top 5 Proyek dengan Kontraktor Terbanyak
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Proyek dengan jumlah kontraktor terbanyak
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
    <!-- Cards Section -->
    <section>
        <div class="">
            <div class="container" style="padding:50px 0">

                <h2>Top 5 Proyek dengan Kontraktor Terbanyak</h2>

                <hr>

                @if ($proyekTerbanyak->count())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Lokasi</th>
                                <th>Anggaran</th>
                                <th>Total Kontraktor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyekTerbanyak as $index => $proyek)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $proyek->nama_proyek }}</td>
                                    <td>{{ $proyek->lokasi }}</td>
                                    <td>Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</td>
                                    <td>{{ $proyek->total_kontraktor }}</td>
                                    <td>
                                        <a href="{{ route('detail-proyek', parameters: $proyek->proyek_id) }}"
                                            class="btn btn-daner">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p><strong>Data proyek kosong</strong></p>
                @endif

            </div>
        </div>
        </div>
    @endsection
