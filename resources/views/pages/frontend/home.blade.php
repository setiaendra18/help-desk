@extends('layouts.frontend-main')
@push('add-css')
@endpush
@section('title', $title)
@section('beranda', 'active')
@section('content')

        <div class="container ">
            <h4 class="text-center"> <img src="{{ url('public/images/logo/' . $sistem->logo_images) }}" width="150px"></h4>
            <h2 class="h4 mb-4 text-center bg-primary text-white">{{ $sistem->nama_sistem }} - {{ $sistem->nama_instansi }}
            </h2>

                <hr>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('frontpages.form-pengaduan') }}">
                        <div class="card shadow text-center">

                            <div class="card-body">
                                <i class="fa fa-book text-danger " style="font-size: 44px;"></i><br>
                                <h4>Kirim Laporan</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('frontpages.form-pantau-pengaduan') }}">
                    <div class="card shadow text-center">

                        <div class="card-body">
                            <i class="fa fa-search text-primary " style="font-size: 44px;"></i><br>
                            <h4>Lacak Laporan</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="https://wa.me/{{ $sistem->no_telephone }}">
                    <div class="card shadow text-center">
                        <div class="card-body">
                            <i class="fab fa-whatsapp text-success" style="font-size: 44px;"></i><br>
                            <h4>Tanya admin</h4>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

@endsection
@push('add-js')
@endpush
