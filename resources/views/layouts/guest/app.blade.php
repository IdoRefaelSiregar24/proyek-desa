<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
	<title>Desa Balam Sempurna</title>
    @include('layouts.guest.css')
</head>

<body>
    @include('layouts.guest.preloader')
    {{-- Navbar --}}
    @include('layouts.guest.navbar')
    {{-- Content --}}
    @yield('content')
    @include('layouts.guest.wa')

    <br>
    {{-- Footer --}}
    @include('layouts.guest.footer')
    @include('layouts.guest.js')
</body>

</html>
