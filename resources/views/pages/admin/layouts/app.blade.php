<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-admin/img/favicon.jpg') }}">
    {{-- Start CSS --}}
    @include('admin.layouts.css')
    {{-- End CSS --}}

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        {{-- Start Header --}}
        @include('admin.layouts.header')
        {{-- End Header --}}

        {{-- Start Sidebar --}}
        @include('admin.layouts.sidebar')
        {{-- End Sidebar --}}

        {{-- Start Main Content --}}
        @yield('content')
        {{-- End Main Content --}}
    </div>

    <!-- Footer -->
    @include('admin.layouts.footer')
    <!-- End Footer -->


    {{-- Start Js --}}
    @include('admin.layouts.js')
    {{-- End Js --}}
</body>

</html>
