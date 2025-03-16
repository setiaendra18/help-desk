@extends('layouts.frontend-main')
@push('add-css')
@endpush
@section('pengaduan', 'active')
@section('content')
    <div class="container">

        <div class="row " style="background: #fff" class="shadow">
            <h4 class="text-center"> <img src="{{ url('public/images/logo/' . $sistem->logo_images) }}" width="150px"></h4>
            <h2 class="text-center"> {{ $title }}</h2>
            <hr>
            <div class="col-lg-12 col-xl-12 p-5 ">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success') || session('kode_unik'))
                            <div class="alert alert-success" id="success-alert">
                                <i class="fa fa-check-circle-o"></i> {{ session('success') }}
                            </div>
                            <div class="alert alert-info" id="success-alert">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Gunakan kode unik untuk melakukan <strong>tracking</strong> laporan anda.</p>
                                        <hr>
                                        <strong>KODE UNIK LAPORAN : </strong> <span id="kode_unik">{{ session('kode_unik') }}</span>
                                        <button id="copy-button" onclick="copyKodeUnik()" class="btn btn-secondary"><i
                                                class="fa fa-copy"> </i> SALIN KODE</button>
                                    </div>
                                </div>
                            </div>
                        @elseif(session('hapus'))
                            <div class="alert alert-danger p-1" id="hapus-alert">
                                <i class="fa fa-close"></i> {{ session('hapus') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger p-1" id="hapus-alert">
                                <i class="fa fa-close"></i> {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="ps-xl-3">
                    <form action="{{ route('frontpages.form-pengaduans-store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="quform-elements">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="quform-element form-group">
                                        <label for="name">Nama <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control" type="text" name="nama_pelapor"
                                                placeholder="Nama Pelapor .." />
                                        </div>
                                        @error('nama_pelapor')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="quform-element form-group">
                                        <label for="email">Email <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control" type="text" name="email"
                                                placeholder="helpdesk@mail.com" />
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="quform-element form-group">
                                        <label for="no_ponsel">Nomor Ponsel<span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control" type="text" name="no_telephone"
                                                placeholder="081243316900" maxlength="13" minlength="10" />
                                        </div>
                                        @error('no_telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <label for="jenis_laporan">Jenis Laporan Kendala<span
                                                class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <select class="form-control form-control-lg "
                                                name="id_jenis_laporan">
                                                <option selected disabled> --Jenis Laporan Kendala --</option>
                                                @foreach ($jenisLaporan as $data)
                                                    <option value="{{ $data->id }}">{{ $data->jenis_laporan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('jenis_laporan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <label for="piroritas_laporan">Prioritas Laporan<span
                                                class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <select class="form-control form-control-lg "
                                                name="id_prioritas_laporan">
                                                <option selected disabled> -- Pilih Piroritas Laporan --</option>
                                                @foreach ($prioritasLaporan as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('piroritas_laporan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="quform-element form-group">
                                    <label for="phone">Uraian Kendala <span class="quform-required">*</span></label>
                                    <div class="quform-input">
                                        <textarea class="form-control h-auto" rows="10" name="uraian_kendala" placeholder="Jelaskan Kendala yang ada"></textarea>
                                    </div>
                                    @error('uraian_kendala')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="quform-element form-group">
                                    <label for="phone">File Pendukung <span class="quform-required">*</span></label>
                                    <div class="quform-input">
                                        <input type="file" class="form-control" name="file">
                                    </div>
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="alert  mt-3" role="alert">
                                        <p><strong>Keterangan Unggah : </strong></p>
                                        <ul>
                                            <li><small>Format file yang dapat di unggah dalam formulir pengaduan ini
                                                    antara lain <strong>ZIP, .RAR, .DOC, .DOCX, .XLS, .XLSX, .PPT,
                                                        .PPTX, .PDF, .JPG, .JPEG, .PNG, .AVI, .MP4, .3GP, .MP3</strong>
                                                </small></li>
                                            <li><small>File Maksimal 5 MB</small></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Textarea element -->
                            <!-- Begin Submit button -->
                            <div class="col-md-12">
                                <div class="quform-submit-inner">
                                    <button class="btn btn-danger btn-lg border-0" type="submit"> KIRIM LAPORAN</button>
                                    <a href="{{ route('frontpages.index') }}" class="btn btn-dark btn-lg border-0" >KEMBALI</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Submit button -->
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
@push('add-js')
    <script>
        $(document).ready(function() {
            $('#copy-button').click(function() {
                var kodeUnik = $('#kode_unik').text();
                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(kodeUnik);
                tempInput.select();
                document.execCommand('copy');
                tempInput.remove();
                alert('Kode Berhasil Di Salin')
            });
        });
    </script>
@endpush
