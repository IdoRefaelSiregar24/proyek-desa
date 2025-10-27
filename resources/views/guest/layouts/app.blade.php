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
    @include('guest.layouts.css')
</head>


<body>
    {{-- Navbar --}}
    @include('guest/layouts.navbar')

    {{-- Content --}}
    @yield('content')

    <br>
    {{-- Footer --}}
    @include('guest/layouts.footer')
    @include('guest/layouts.js')
</body>

</html>
