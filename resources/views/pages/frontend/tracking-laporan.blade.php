@extends('layouts.frontend-main')
@push('add-css')
    <style>
        .form-inline {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .form-inline .form-group {
            margin-right: 10px;
            margin-bottom: 0;
        }

        .form-inline .form-control {
            display: block;
            width: auto;
        }

        .form-inline button[type="submit"] {
            margin-top: 5px;
        }

        .col-12 {
            width: 100%;
        }
    </style>
@endpush
@section('content')

    <div class="container p-4" style="background: #fff" class="shadow">
        <h4 class="text-center"> <img src="{{ url('public/images/logo/' . $sistem->logo_images) }}" width="150px"></h4>
        <h2 class="text-center"> {{ $title }}</h2>
        <hr>
        <form action="{{ route('frontpages.form-pantau-pengaduan') }}" method="POST" class="form-inline">
            @csrf
            @method('GET')
            <div class="form-group">
                <label for="kode_unik" class="mr-2">Kode Unik:</label>
                <input type="text" name="kode_unik" class="form-control mr-2 " style="width:900px"
                    placeholder="Kode unik berupa kode random berjumlah 10 karakter yang di berikan ketika anda melakukan submit laporan"required>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> LACAK</button>

            @error('kode_unik')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </form>

        <hr>
        @if (isset($pengaduan))
            <h5 class="text-green"><i class="fa fa-book"></i> Status Laporan</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tanggal laporan</th>
                        <th scope="col">Nama Pelapor</th>

                        <th scope="col">Jenis Laporan</th>
                        <th scope="col">Prioritas Laporan</th>
                        <th scope="col">Petugas </th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{ $pengaduan->created_at }}</td>
                        <td>{{ $pengaduan->nama_pelapor }}</td>

                        <td>{{ $pengaduan->jenisLaporan->jenis_laporan }}</td>

                        <td>{{ $pengaduan->prioritasLaporan->nama }} </td>
                        <td>
                            @if (!empty($pengaduan->pengguna->name) && !empty($pengaduan->pengguna->telephone))
                                {{ $pengaduan->pengguna->name }} - <a
                                    href="https://wa.me/{{ $pengaduan->pengguna->telephone }}"
                                    class="btn btn-primary btn-sm"
                                    target="_blank">{{ $pengaduan->pengguna->telephone }}</a>
                            @else
                                Belum ada petugas
                            @endif
                        </td>

                        <td
                            style="color:
                            @if ($pengaduan->status === 'BARU') blue;
                            @elseif ($pengaduan->status === 'DITERIMA')
                                green;
                            @elseif ($pengaduan->status === 'DALAM PROSES')
                                yellow;
                            @elseif ($pengaduan->status === 'TIDAK VALID')
                                red; @endif
                        ">

                            @if ($pengaduan->status == 'BARU')
                                <span class="label label-primary">{{ $pengaduan->status }}</span>
                            @elseif ($pengaduan->status == 'DITERIMA')
                                <span class="label label-warning">{{ $pengaduan->status }}</span>
                            @elseif ($pengaduan->status == 'DALAM PROSES')
                                <span class="label label-info">{{ $pengaduan->status }}</span><br><br>
                                <a href="{{ url('public/report/status/' . $pengaduan->gambar_proses) }}"><img src="{{ url('public/report/status/' . $pengaduan->gambar_proses) }}" width="75px"></a>

                            @elseif ($pengaduan->status == 'TIDAK VALID')
                                <span class="label label-danger">{{ $pengaduan->status }}</span>
                            @elseif ($pengaduan->status == 'SELESAI')
                                <span class="label label-success">{{ $pengaduan->status }}</span><br><br>
                                <a href="{{ url('public/report/status/' . $pengaduan->gambar_selesai) }}"><img src="{{ url('public/report/status/' . $pengaduan->gambar_selesai) }}" width="75px"></a>

                            @endif
                        </td>

                    </tr>

                </tbody>
            </table>
        @elseif ($errors->any())
            <div class="alert alert-danger">
                Pengaduan dengan Kode Unik tidak ditemukan.
            </div>
        @endif
        <a href="{{ route('frontpages.index') }}" class="btn btn-dark btn-lg border-0">KEMBALI</a>
    </div>

@endsection
@push('add-js')
@endpush
