<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets-admin/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets-admin/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        /* Style khusus untuk kolom deskripsi */
        .deskripsi-cell {
            max-width: 200px;
            min-width: 150px;
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!--  App Topstrip -->
        <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
                <a class="d-flex justify-content-center" href="{{ route('warga.index') }}">
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
                    <a href="{{ route('warga.index') }}" class="text-nowrap logo-img">
                        <img src="{{ asset('assets-admin/images/logos/logo.svg') }}" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('warga.index') }}" aria-expanded="false">
                                <i class="ti ti-atom"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('proyek.index') }}" aria-expanded="false">
                                <i class="ti ti-aperture"></i>
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
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Grafik</h4>
                                            <p class="card-subtitle">
                                                Progres Proyek
                                            </p>
                                        </div>
                                        <div class="ms-auto">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item text-primary">
                                                    <span
                                                        class="round-8 text-bg-primary rounded-circle me-1 d-inline-block"></span>
                                                    Internal
                                                </li>
                                                <li class="list-inline-item text-info">
                                                    <span
                                                        class="round-8 text-bg-info rounded-circle me-1 d-inline-block"></span>
                                                    External
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="sales-overview" class="mt-4 mx-n6"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card overflow-hidden">
                                <div class="card-body pb-0">
                                    <div class="d-flex align-items-start">
                                        <div>
                                            <h4 class="card-title">Data</h4>
                                            <p class="card-subtitle">Tahapan Proyek</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 pb-3 d-flex align-items-center">
                                        <span
                                            class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                            <i class="ti ti-shopping-cart fs-6"></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bolder fs-4">Top Sales</h5>
                                            <span class="text-muted fs-3">Johnathan Doe</span>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge bg-secondary-subtle text-muted">+68%</span>
                                        </div>
                                    </div>
                                    <div class="py-3 d-flex align-items-center">
                                        <span
                                            class="btn btn-warning rounded-circle round-48 hstack justify-content-center">
                                            <i class="ti ti-star fs-6"></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bolder fs-4">Best Seller</h5>
                                            <span class="text-muted fs-3">MaterialPro Admin</span>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge bg-secondary-subtle text-muted">+68%</span>
                                        </div>
                                    </div>
                                    <div class="py-3 d-flex align-items-center">
                                        <span
                                            class="btn btn-success rounded-circle round-48 hstack justify-content-center">
                                            <i class="ti ti-message-dots fs-6"></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bolder fs-4">Most Commented</h5>
                                            <span class="text-muted fs-3">Ample Admin</span>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge bg-secondary-subtle text-muted">+68%</span>
                                        </div>
                                    </div>
                                    <div class="pt-3 mb-7 d-flex align-items-center">
                                        <span
                                            class="btn btn-secondary rounded-circle round-48 hstack justify-content-center">
                                            <i class="ti ti-diamond fs-6"></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bolder fs-4">Top Budgets</h5>
                                            <span class="text-muted fs-3">Sunil Joshi</span>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge bg-secondary-subtle text-muted">+15%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show alert-custom"
                                    role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                                        <strong>Sukses!</strong> {{ session('success') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Tabel</h4>
                                            <p class="card-subtitle">
                                                Data Warga
                                            </p>
                                        </div>
                                        <div class="ms-auto mt-3 mt-md-0">
                                            <a href="{{ route('warga.create') }}"
                                                class="btn btn-success text-white"><i
                                                    class="far fa-question-circle me-1"></i>
                                                Tambah Warga</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-0 text-muted">
                                                        NIK
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Nama
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Jenis Kelamin
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Agama
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Pekerjaan
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        No HP
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted" style="width: 120px;">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataWarga as $item)
                                                    <tr>
                                                        <td class="px-2">{{ $item->no_ktp }}</td>
                                                        <td class="px-2">{{ $item->nama }}</td>
                                                        <td class="px-2">{{ $item->jenis_kelamin }}</td>
                                                        <td class="px-2">{{ $item->agama }}</td>
                                                        <td class="px-2">{{ $item->pekerjaan }}</td>
                                                        <td class="px-2">{{ $item->telp }}</td>
                                                        <td class="px-2">{{ $item->email }}</td>
                                                        <td>
                                                            <div class="action-buttons">
                                                                <a class="btn-action btn-edit" title="Edit Data"
                                                                    href="{{ route('warga.edit', $item->warga_id) }}">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </a>
                                                                <form
                                                                    action="{{ route('warga.destroy', $item->warga_id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn-action btn-delete"
                                                                        title="Hapus Data">
                                                                        <i class="bi bi-trash-fill"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Tabel</h4>
                                            <p class="card-subtitle">
                                                Data Proyek
                                            </p>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Kode Proyek
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Nama Proyek
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Tahun
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Lokasi
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Anggaran
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Sumber Dana
                                                    </th>
                                                    <th scope="col" class="px-0 text-muted">
                                                        Deskripsi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataProyek as $item)
                                                    <tr>
                                                        <td class="px-2">{{ $item->kode_proyek }}</td>
                                                        <td class="px-2">{{ $item->nama_proyek }}</td>
                                                        <td class="px-2">{{ $item->tahun }}</td>
                                                        <td class="px-2">{{ $item->lokasi }}</td>
                                                        <td class="px-2">Rp
                                                            {{ number_format($item->anggaran, 2, ',', '.') }}</td>
                                                        <td class="px-2">{{ $item->sumber_dana }}</td>
                                                        <td class="px-2 deskripsi-cell">{{ $item->deskripsi }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Daftar Kontraktor</h4>
                                </div>
                                <div class="comment-widgets scrollable mb-2 common-widget" style="height: 465px"
                                    data-simplebar="">
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                                        <div>
                                            <span><img src="{{ asset('assets-admin/images/profile/user-3.jpg') }}"
                                                    class="rounded-circle" alt="user" width="50" /></span>
                                        </div>
                                        <div class="comment-text w-100">
                                            <h6 class="fw-medium">James Anderson</h6>
                                            <p class="mb-1 fs-2 text-muted">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                type etting industry
                                            </p>
                                            <div class="comment-footer mt-2">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="
                                        badge
                                        bg-info-subtle
                                        text-info

                                        ">Pending</span>
                                                    <span class="action-icons">
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-edit fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-check fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-heart fs-5"></i></a>
                                                    </span>
                                                </div>
                                                <span
                                                    class="
                                        text-muted
                                        ms-auto
                                        fw-normal
                                        fs-2
                                        d-block
                                        mt-2
                                        text-end
                                    ">April
                                                    14, 2025</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row border-bottom active p-3 gap-3">
                                        <div>
                                            <span><img src="{{ asset('assets-admin/images/profile/user-5.jpg') }}"
                                                    class="rounded-circle" alt="user" width="50" /></span>
                                        </div>
                                        <div class="comment-text active w-100">
                                            <h6 class="fw-medium">Michael Jorden</h6>
                                            <p class="mb-1 fs-2 text-muted">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                type setting industry.
                                            </p>
                                            <div class="comment-footer mt-2">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="
                                        badge
                                        bg-success-subtle
                                        text-success

                                        ">Approved</span>
                                                    <span class="action-icons active">
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-edit fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-circle-x fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-heart text-danger fs-5"></i></a>
                                                    </span>
                                                </div>
                                                <span
                                                    class="
                                        text-muted
                                        ms-auto
                                        fw-normal
                                        fs-2
                                        text-end
                                        mt-2
                                        d-block
                                    ">April
                                                    14, 2025</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                                        <div>
                                            <span><img src="{{ asset('assets-admin/images/profile/user-6.jpg') }}"
                                                    class="rounded-circle" alt="user" width="50" /></span>
                                        </div>
                                        <div class="comment-text w-100">
                                            <h6 class="fw-medium">Johnathan Doeting</h6>
                                            <p class="mb-1 fs-2 text-muted">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                type setting industry.
                                            </p>
                                            <div class="comment-footer mt-2">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="
                                        badge
                                        bg-danger-subtle
                                        text-danger

                                        ">Rejected</span>
                                                    <span class="action-icons">
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-edit fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-check fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-heart fs-5"></i></a>
                                                    </span>
                                                </div>
                                                <span
                                                    class="
                                        text-muted
                                        ms-auto
                                        fw-normal
                                        fs-2
                                        d-block
                                        mt-2
                                        text-end
                                    ">April
                                                    14, 2025</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row p-3 gap-3">
                                        <div>
                                            <span><img src="{{ asset('assets-admin/images/profile/user-4.jpg') }}"
                                                    class="rounded-circle" alt="user" width="50" /></span>
                                        </div>
                                        <div class="comment-text w-100">
                                            <h6 class="fw-medium">James Anderson</h6>
                                            <p class="mb-1 fs-2 text-muted">
                                                Lorem Ipsum is simply dummy text of the printing and
                                                type setting industry.
                                            </p>
                                            <div class="comment-footer mt-2">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="
                                        badge
                                        bg-info-subtle
                                        text-info

                                        ">Pending</span>
                                                    <span class="action-icons">
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-edit fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-check fs-5"></i></a>
                                                        <a href="javascript:void(0)" class="ps-3"><i
                                                                class="ti ti-heart fs-5"></i></a>
                                                    </span>
                                                </div>
                                                <span
                                                    class="
                                        text-muted
                                        ms-auto
                                        fw-normal
                                        fs-2
                                        d-block
                                        text-end
                                        mt-2
                                    ">April
                                                    14, 2025</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Laporan Cuaca</h4>
                                        <select class="form-select w-auto ms-auto">
                                            <option selected="">Hari ini</option>
                                            <option value="1">Per minggu</option>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center flex-row mt-4">
                                        <div class="p-2 display-5 text-primary">
                                            <i class="ti ti-cloud-snow"></i>
                                            <span>34<sup>°</sup></span>
                                        </div>
                                        <div class="p-2">
                                            <h3 class="mb-0">Sabtu</h3>
                                            <small>Pekanbaru, Riau</small>
                                        </div>
                                    </div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Wind</td>
                                                <td class="fw-medium">ESE 17 mph</td>
                                            </tr>
                                            <tr>
                                                <td>Humidity</td>
                                                <td class="fw-medium">83%</td>
                                            </tr>
                                            <tr>
                                                <td>Pressure</td>
                                                <td class="fw-medium">28.56 in</td>
                                            </tr>
                                            <tr>
                                                <td>Cloud Cover</td>
                                                <td class="fw-medium">78%</td>
                                            </tr>
                                            <tr>
                                                <td>Ceiling</td>
                                                <td class="fw-medium">25760 ft</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr />
                                    <ul class="list-unstyled row text-center city-weather-days mb-0">
                                        <li class="col">
                                            <i class="ti ti-sun-high fs-4"></i><span>09:30</span>
                                            <h3 class="mb-0 fs-6 lh-base">70<sup>°</sup></h3>
                                        </li>
                                        <li class="col">
                                            <i class="ti ti-cloud fs-4"></i><span>11:30</span>
                                            <h3 class="mb-0 fs-6 lh-base">72<sup>°</sup></h3>
                                        </li>
                                        <li class="col">
                                            <i class="ti ti-cloud-rain fs-4"></i><span>13:30</span>
                                            <h3 class="mb-0 fs-6 lh-base">75<sup>°</sup></h3>
                                        </li>
                                        <li class="col">
                                            <i class="ti ti-cloud-snow fs-4"></i><span>15:30</span>
                                            <h3 class="mb-0 fs-6 lh-base">76<sup>°</sup></h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
    <script src="{{ asset('assets-admin/js/dashboard.js') }}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
