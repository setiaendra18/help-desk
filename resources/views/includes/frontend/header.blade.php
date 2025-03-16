<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center mt-0 bg-logo">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="{{ route('frontpages.index') }}"><img
                    src="{{ url('public/images/logo/' . $sistem->logo_images) }}"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link @yield('beranda')" href="{{ route('frontpages.index') }}">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Tentang WBS</span></span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('frontpages.tentang') }}">Tentang WBS</a></li>
                        <li><a href="{{ route('frontpages.alur-pengaduan') }}">Alur Pengaduan</a></li>
                    </ul>
                </li>
                <li class="dropdown "><a href="{{ route('frontpages.form-pengaduan') }}" class="@yield('pengaduan')"><span>Pengaduan</span></span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('frontpages.form-pengaduan') }}">Tulis Pengaduan</a></li>
                        <li><a href="{{ route('frontpages.form-pantau-pengaduan') }}">Pantau Pengaduan</a></li>
                    </ul>
                </li>
                <li><a class="nav-link @yield('kontak')" href="{{ route('frontpages.kontak') }}">Kontak dan Informasi</a></li>
            </ul>
            <i class="fa fa-list mobile-nav-toggle "></i>
        </nav><!-- .navbar -->
        <a href="{{ route('frontpages.form-pengaduan') }}"
            class="btn btn-danger btn-sm ml-5  d-none d-lg-inline-block"><i class="fa fa-edit"></i> Tulis Pengaduan</a>
    </div>
</header><!-- End Header -->
