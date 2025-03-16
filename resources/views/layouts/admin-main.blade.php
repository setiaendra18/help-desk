<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.head')
</head>
<body class="hold-transition skin-green sidebar-light sidebar-mini">


    <!-- Site wrapper -->
    <div class="wrapper">
        @include('includes.admin.header')
        @include('includes.admin.sidebar')
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('includes.admin.breadcumb')
                  @include('includes.admin.alert')
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('includes.admin.footer')
</body>
</html>
