@extends('layouts.frontend-main')
@push('add-css')
    <style>
        .select2-selection__rendered {
            line-height: 55px !important;
        }
        .select2-container .select2-selection--single {
            height: 55px !important;
        }
        .select2-selection__arrow {
            height: 55px !important;
        }
    </style>
@endpush
@section('kontak','active')
@section('content')
    <!-- CONTACT FORM
        ================================================== -->
        <section>
            <div class="container">
                <div class="inner-title">
                    <h2 class="h4 mb-0">{{ $title }}</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-style4 mt-1-9">
                            <div class="card-body p-1-6 p-sm-1-9">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 icon-box">
                                        <i class="ti-location-pin text-primary z-index-9 display-8 position-relative"></i>
                                        <div class="box-circle primary"></div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="h5">Alamat</h4>
                                        <span>{{ $sistem->alamat }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-style4 mt-1-9">
                            <div class="card-body p-1-6 p-sm-1-9">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 icon-box">
                                        <i class="ti-mobile text-primary z-index-9 display-8 position-relative"></i>
                                        <div class="box-circle primary"></div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="h5">Telephone</h4>
                                        <span>{{ $sistem->no_telephone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-style4 mt-1-9">
                            <div class="card-body p-1-6 p-sm-1-9">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 icon-box">
                                        <i class="ti-email text-primary z-index-9 display-8 position-relative"></i>
                                        <div class="box-circle primary"></div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="h5">Email </h4>
                                        <span>{{ $sistem->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card card-style4 mt-1-9">
                            <div class="card-header">
                                <i class="fa fa-map-marked-alt"></i> Peta Lokasi
                            </div>
                            <div class="card-body p-1-6 p-sm-1-9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15810.837408400188!2d110.399952!3d-7.8205572!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a571664f28895%3A0x42920015ad258e35!2sBPKH%20Wilayah%20XI%20Yogyakarta!5e0!3m2!1sid!2sid!4v1684809393390!5m2!1sid!2sid" class="w-100" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@push('add-js')
@endpush
