@extends('layouts.guest.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="section-title">
                            <h1 class="text-anime-style-3">Edit Progress Proyek</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                Mengedit progress untuk proyek:
                                <strong>{{ $proyek->nama_proyek }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Form -->
    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">

        <div class="section-title">
            <h3 class="wow fadeInUp">{{ $proyek->nama_proyek }}</h3>
            <h2 class="text-anime-style-3" data-cursor="-opaque">Edit Progress</h2>
        </div>

        <form action="{{ route('progress-guest.update', $progress->progres_id) }}" method="POST"> @csrf
            @method('PUT')

            <!-- PROYEK ID (HIDDEN) -->
            <input type="hidden" name="proyek_id" value="{{ $proyek->proyek_id }}">

            <div class="row">

                <!-- TAHAP -->
                <div class="form-group col-md-12 mb-4">
                    <label class="fw-bold mb-2">Pilih Tahap Proyek</label>
                    <select name="tahap_id" class="form-control" required>
                        <option value="">-- Pilih Tahapan --</option>
                        @foreach ($tahapan as $t)
                            <option value="{{ $t->tahap_id }}" {{ $t->tahap_id == $progress->tahap_id ? 'selected' : '' }}>
                                {{ $t->nama_tahap }} (Target: {{ $t->target_persen }}%)
                            </option>
                        @endforeach
                    </select>
                    @error('tahap_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- PERSEN REAL -->
                <div class="form-group col-md-6 mb-4">
                    <input type="number" name="persen_real" class="form-control" placeholder="Persentase Real (%)"
                        min="0" max="100" step="0.1" value="{{ $progress->persen_real }}" required>
                </div>

                <!-- TANGGAL -->
                <div class="form-group col-md-6 mb-4">
                    <input type="date" name="tanggal" class="form-control" value="{{ $progress->tanggal }}" required>
                </div>

                <!-- CATATAN -->
                <div class="form-group col-md-12 mb-4">
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan Progress">{{ $progress->catatan }}</textarea>
                </div>

                <!-- BUTTON -->
                <div class="col-md-12">
                    <button type="submit" class="btn-default">
                        <i class="fa-solid fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
