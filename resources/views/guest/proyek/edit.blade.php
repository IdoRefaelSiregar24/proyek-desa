@extends('guest.layouts.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero bg-section parallaxie py-5">
        <div class="container text-center text-white">
            <h1 class="display-4 fw-bold">Tambah Proyek Baru</h1>
            <p>Isi form berikut untuk menambahkan proyek baru</p>
        </div>
    </div>
    <!-- Hero Section End -->

    

    <!-- Start Form Section -->
    <section class="project-form py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Form Tambah Proyek</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk menambahkan proyek -->
                            <form action="{{ route('guest.proyek.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_proyek" class="form-label">Kode Proyek</label>
                                    <input type="text" name="kode_proyek" id="kode_proyek" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_proyek" class="form-label">Nama Proyek</label>
                                    <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="anggaran" class="form-label">Anggaran</label>
                                    <input type="number" name="anggaran" id="anggaran" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="sumber_dana" class="form-label">Sumber Dana</label>
                                    <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="progress" class="form-label">Progress (%)</label>
                                    <input type="number" name="progress" id="progress" class="form-control" min="0"
                                        max="100" value="0" required>
                                </div>

                                <button type="submit" class="btn btn-success w-100">Simpan Proyek</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form Section -->
@endsection
