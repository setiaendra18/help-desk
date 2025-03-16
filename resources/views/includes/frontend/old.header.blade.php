<header class="header-style1 menu_area-dark">

    <div class="navbar-default border-bottom border-color-light-white">

        <!-- start top search -->
        <div class="top-search bg-dark">
            <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
                <form class="search-form" action="search.html" method="GET" accept-charset="utf-8">
                    <div class="input-group">
                        <span class="input-group-addon cursor-pointer">
                            <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                        </span>
                        <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                        <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- end top search -->

        <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="menu_area alt-font">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <div class="navbar-header navbar-header-custom">
                                 <!-- start logo -->
                                 <a href="{{ route('frontpages.index') }}" class="navbar-brand ">
                                     <img id="logo"
                                         src="{{ url('public/images/logo/' . $sistem->logo_images) }}"
                                         alt="logo">
                                 </a>
                                 <!-- end logo -->
                             </div>
                             <div class="navbar-toggler"></div>
                             <!-- start menu area -->
                             <ul class="navbar-nav ms-auto " id="nav" >
                                 <li><a href="{{ url('/') }}">BERANDA</a> </li>
                                 <li>
                                     <a href="#!">TENTANG WBS</a>
                                     <ul>
                                         <li><a href="{{ url('/') }}">Tentang WBS (<i>whistel bloing sistem</i>)
                                             </a></li>
                                         <li><a href="{{ url('/') }}">Alur Pengaduan </a></li>
                                     </ul>
                                 </li>
                                 <li>
                                     <a href="#!">PENGADUAN</a>
                                     <ul>
                                         <li><a href="{{ route('frontpages.form-pengaduan') }}">Tulis Pengaduan</a></li>
                                         <li><a href="{{ route('frontpages.form-pantau-pengaduan') }}">Pantau
                                                 Pengaduan</a></li>
                                     </ul>
                                 </li>
                                 <li><a href="{{ route('frontpages.kontak') }}">KONTAK</a></li>
                             </ul>
                             <!-- end menu area -->
                             <!-- start attribute navigation -->
                             <div class="attr-nav align-items-lg-center ms-lg-auto main-font">
                                 <ul>
                                     <li class="search"><a href="#!"><i class="fas fa-search"></i></a></li>
                                     <li class="d-none d-xl-inline-block"><a href="{{ route('frontpages.form-pengaduan') }}"
                                             class="butn-style2 bg-white text-danger md"><i class="fa fa-edit"></i>
                                             TULIS PENGADUAN</a></li>
                                 </ul>
                             </div>
                             <!-- end attribute navigation -->
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
