    <meta charset="utf-8" />
    <meta name="author" content="Website Design Templates" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Insurance Agency HTML Template" />
    <meta name="description" content="Lifest - Insurance Agency HTML Template" />
    <title>{{ $sistem->nama_sistem }} - {{ $sistem->nama_instansi }}</title>
    <link rel="shortcut icon" href="img/logos/favicon.png">
    <link rel="apple-touch-icon" href="img/logos/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/logos/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/logos/apple-touch-icon-114x114.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ url('public/template/frontend/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ url('public/template/frontend/search/search.css') }}">
    <link rel="stylesheet" href="{{ url('public/template/frontend/quform/css/base.css') }}">
    <link href="{{ url('public/template/frontend/css/styles.css') }}" rel="stylesheet">
    <link href="{{ url('public/template/frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ url('public/template/frontend/css/select2.min.css') }}" rel="stylesheet">
    <style>
        :root {
            --header-color: #EBF2F8;
        }

        #header {
            background: var(--header-color);
            transition: all 0.5s;
            z-index: 997;
            height: 86px;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        }

        #header.fixed-top {
            height: 70px;
        }

        #header .logo {
            font-size: 30px;
            margin: 0;
            padding: 0;
            line-height: 1;
            font-weight: 600;
            letter-spacing: 0.8px;
            font-family: "Poppins", sans-serif;
        }

        #header .logo a {
            color: #222222;
        }

        #header .logo a span {
            color: #106eea;
        }

        #header .logo img {
            max-height: 40px;
        }

        .scrolled-offset {
            margin-top: 70px;
        }

        .navbar {
            padding: 0;
        }

        .navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        .navbar li {
            position: relative;
        }

        .navbar>ul>li {
            white-space: nowrap;
            padding: 10px 0 10px 28px;
        }

        .navbar a,
        .navbar a:focus {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 3px;
            font-size: 15px;
            font-weight: 600;
            color: #131212;
            white-space: nowrap;
            transition: 0.3s;
            position: relative;
        }

        .navbar a i,
        .navbar a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 5px;
        }

        .navbar>ul>li>a:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -6px;
            left: 0;
            background-color: #b40404;
            visibility: hidden;
            width: 0px;
            transition: all 0.3s ease-in-out 0s;
        }

        .navbar a:hover:before,
        .navbar li:hover>a:before,
        .navbar .active:before {
            visibility: visible;
            width: 100%;
        }

        .navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            color: #f3680b;
        }

        .navbar .dropdown ul {
            display: block;
            position: absolute;
            left: 28px;
            top: calc(100% + 30px);
            margin: 0;
            padding: 10px 0;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            background: var(--header-color);
            box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
            transition: 0.3s;
        }

        .navbar .dropdown ul li {
            min-width: 200px;
        }

        .navbar .dropdown ul a {
            padding: 10px 20px;
            font-weight: 400;
        }

        .navbar .dropdown ul a i {
            font-size: 12px;
        }

        .navbar .dropdown ul a:hover,
        .navbar .dropdown ul .active:hover,
        .navbar .dropdown ul li:hover>a {
            color: #f3680b;
        }

        .navbar .dropdown:hover>ul {
            opacity: 1;
            top: 100%;
            visibility: visible;
        }

        .navbar .dropdown .dropdown ul {
            top: 0;
            left: calc(100% - 30px);
            visibility: hidden;
        }

        .navbar .dropdown .dropdown:hover>ul {
            opacity: 1;
            top: 0;
            left: 100%;
            visibility: visible;
        }

        @media (max-width: 1366px) {
            .navbar .dropdown .dropdown ul {
                left: -90%;
            }

            .navbar .dropdown .dropdown:hover>ul {
                left: -100%;
            }
        }

        /**
* Mobile Navigation
*/
        .mobile-nav-toggle {
            color: #222222;
            font-size: 28px;
            cursor: pointer;
            display: none;
            line-height: 0;
            transition: 0.5s;
        }

        .mobile-nav-toggle.bi-x {
            color: #fff;
        }

        @media (max-width: 991px) {
            .mobile-nav-toggle {
                display: block;
            }

            .navbar ul {
                display: none;
            }
        }

        .navbar-mobile {
            position: fixed;
            overflow: hidden;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(9, 9, 9, 0.9);
            transition: 0.3s;
            z-index: 999;
        }

        .navbar-mobile .mobile-nav-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .navbar-mobile ul {
            display: block;
            position: absolute;
            top: 55px;
            right: 15px;
            bottom: 15px;
            left: 15px;
            padding: 10px 0;
            background-color: #fff;
            overflow-y: auto;
            transition: 0.3s;
        }

        .navbar-mobile a,
        .navbar-mobile a:focus {
            padding: 10px 20px;
            font-size: 15px;
            color: #222222;
        }

        .navbar-mobile>ul>li {
            padding: 0;
        }

        .navbar-mobile a:hover:before,
        .navbar-mobile li:hover>a:before,
        .navbar-mobile .active:before {
            visibility: hidden;
        }

        .navbar-mobile a:hover,
        .navbar-mobile .active,
        .navbar-mobile li:hover>a {
            color: #106eea;
        }

        .navbar-mobile .getstarted,
        .navbar-mobile .getstarted:focus {
            margin: 15px;
        }

        .navbar-mobile .dropdown ul {
            position: static;
            display: none;
            margin: 10px 20px;
            padding: 10px 0;
            z-index: 99;
            opacity: 1;
            visibility: visible;
            background: #fff;
            box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
        }

        .navbar-mobile .dropdown ul li {
            min-width: 200px;
        }

        .navbar-mobile .dropdown ul a {
            padding: 10px 20px;
        }

        .navbar-mobile .dropdown ul a i {
            font-size: 12px;
        }

        .navbar-mobile .dropdown ul a:hover,
        .navbar-mobile .dropdown ul .active:hover,
        .navbar-mobile .dropdown ul li:hover>a {
            color: #106eea;
        }

        .navbar-mobile .dropdown>.dropdown-active {
            display: block;
        }

        /*--------------------------------------------------------------
# Top Bar
--------------------------------------------------------------*/
        #topbar {
            background: #106eea;
            height: 40px;
            font-size: 14px;
            transition: all 0.5s;
            color: #fff;
            padding: 0;
        }

        #topbar .contact-info i {
            font-style: normal;
            color: #fff;
        }

        #topbar .contact-info i a,
        #topbar .contact-info i span {
            padding-left: 5px;
            color: #fff;
        }

        #topbar .contact-info i a {
            line-height: 0;
            transition: 0.3s;
            transition: 0.3s;
        }

        #topbar .contact-info i a:hover {
            color: #fff;
            text-decoration: underline;
        }

        #topbar .social-links a {
            color: rgba(255, 255, 255, 0.7);
            line-height: 0;
            transition: 0.3s;
            margin-left: 20px;
        }

        #topbar .social-links a:hover {
            color: white;
        }


    </style>
