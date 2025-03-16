<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.frontend.head')
    @stack('add-css')
    <style>
          .bg {
            background-image: url('{{ url('public/images/background/' . $sistem->background) }}');
            background-size: cover;
            background-repeat: no-repeat;

        }
    </style>
</head>
<body class="bg">
    {{-- Preload - Halaman --}}
    <div id="preloader"></div>
    {{-- End Preload Halaman --}}
    <!-- MAIN WRAPPER -->
    <div class="main-wrapper bg">

        @yield('content')
        @include('includes.frontend.footer')
        @stack('add-js')
</body>
</html>
