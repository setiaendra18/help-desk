<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $sistem->nama_sistem }} - {{ $sistem->nama_instansi }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    @include('includes.admin.head')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        /* Add your custom styles here */
        body {
            background-image: url('{{ url('public/images/background/' . $sistem->background) }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: right bottom;
        }
    </style>
</head>

<body class="hold-transition ">
    <div class="login-box shadow-lg" style="box-shadow: 8px">
        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="login-logo">
                <img src="{{ url('public/images/logo/' . $sistem->logo_images) }}" class="img-fluid img-responsive">
            </div>
            <div class="text-center">
                <span class="h4 font-weight-bold">{{ $sistem->nama_sistem }}</span></span>
            </div>
            <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="gatotkaca@mail.com">

                    @error('email')
                        <div class="alert alert-danger mt-2 mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="********">

                    @error('password')
                        <div class="alert alert-danger mt-2 mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in "></i>
                            MASUK SISTEM</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    @include('includes.admin.js')

    </Script>
</body>

</html>
