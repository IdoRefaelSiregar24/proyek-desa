<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Warga - Flexy Admin Template</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets-admin/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets-admin/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!--  App Topstrip -->
        <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
                <a class="d-flex justify-content-center" href="#">
                    <img src="{{ asset('assets-admin/images/logos/logo-wrappixel.svg') }}" alt=""
                        width="150">
                </a>
            </div>
        </div>
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('assets-admin/images/logos/logo.svg') }}" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('warga.index') }}" aria-expanded="false">
                                <i class="ti ti-atom"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <i class="ti ti-atom"></i>
                                <span class="hide-menu">Daftar Proyek</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ti ti-bell"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                                <div class="message-body">
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        Item 1
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        Item 2
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('assets-admin/images/profile/user-1.jpg') }}" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <!--  Row 1 -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center mb-4">
                                    <div>
                                        <h4 class="card-title">Form Tambah Data Warga</h4>
                                        <p class="card-subtitle">
                                            Isi form berikut untuk menambahkan data warga baru
                                        </p>
                                    </div>
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <a href="{{ route('warga.index') }}" class="btn btn-secondary text-white">
                                            <i class="bi bi-arrow-left me-1"></i>
                                            Kembali
                                        </a>
                                    </div>
                                </div>

                                <!-- Form Tambah Data Warga -->
                                <form action="{{ route('warga.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="no_ktp" class="form-label">NIK</label>
                                            <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                                                   placeholder="Masukkan NIK" required value="{{ old('no_ktp') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nama" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                   placeholder="Masukkan nama lengkap" required value="{{ old('nama') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required value="{{ old('jenis_kelamin') }}">
                                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="agama" class="form-label">Agama</label>
                                            <input type="text" class="form-control" id="agama" name="agama"
                                                   placeholder="Masukkan agama anda" required value="{{ old('agama') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                                   placeholder="Masukkan pekerjaan" required value="{{ old('pekerjaan') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telp" class="form-label">No. HP</label>
                                            <input type="text" class="form-control" id="telp" name="telp"
                                                   placeholder="Masukkan nomor telepon" required value="{{ old('telp') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="Masukkan alamat email" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="reset" class="btn btn-light me-2">
                                            <i class="bi bi-arrow-clockwise me-1"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-plus-circle me-1"></i> Tambah Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets-admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets-admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/simplebar/dist/simplebar.js') }}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
