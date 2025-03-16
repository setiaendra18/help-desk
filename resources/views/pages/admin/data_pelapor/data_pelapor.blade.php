@extends('layouts.admin-main')
@section('title', $title)
@push('add-css')
    @section('content')
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border border-primary ">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tabel_data_pelapor" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>E-MAIL</th>
                                    <th>Pelapor (Anonim)</th>
                                    <th>Jumlah Laporan</th>
                                    <th>Laporan Terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPelapor as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->pelapor }}</td>
                                        <td>
                                            @php
                                                $jumlah_laporan = DB::table('pengaduans')
                                                    ->where('email', $data->email)
                                                    ->count();
                                            @endphp
                                            {{ $jumlah_laporan }}
                                        </td>
                                        <td>
                                            @php
                                                $laporan_terkahir = DB::table('pengaduans')
                                                    ->where('email', $data->email)
                                                    ->max('created_at');
                                            @endphp
                                            {{ $laporan_terkahir }}
                                        </td>
                                        <td>
                                            <button onclick="viewLaporan('{{ $data->email }}')" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        {{-- MODAL --}}
        <div class="modal fade" id="viewLaporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="modal-title">Riwayat Laporan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <h4><i class="fa fa-history"></i> Riwayat Laporan by E-mail <span class="text-danger" id="emailView">-</span></h4>
                        <div class="card p-3">
                            <div class="card-body p-3">
                                <table class="table table-bordered table-striped text-sm" id="laporanTable">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>KODE UNIK</th>
                                            <th>JENIS LAPORAN</th>
                                            <th>TANGGAL LAPORAN</th>
                                            <th>STATUS LAPORAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('add-js')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                /*DATA TABLE */
                $('#tabel_data_pelapor').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                    },
                    'paging': true,
                    'lengthChange': true,
                    'searching': true,
                    'ordering': true,
                    'info': true,
                    'autoWidth': true
                });
                /* END SELECT 2 */
              
                /*FUNCTION */
                viewLaporan = (email) => {
                   
                    $.ajax({
                        url: '{{ route('admin.data-pelapor-riwayat') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'email': email
                        },
                        dataType: "JSON",
                        success: function(res) {
                     
                            $('#laporanTable tbody').empty();
                            $.each(res, function(index, data) {
                                var row = $('<tr>');
                                var cell1 = $('<td>').text(data.kode_unik);
                                var cell2 = $('<td>').text(data.id_jenis);
                                var cell3 = $('<td>').text(data.created_at);
                                var cell4 = $('<td>').text(data.status);
                                row.append(cell1, cell2, cell3,cell4);
                                $('#laporanTable tbody').append(row);
                            });
                            $('#viewLaporanModal').modal('show');
                        }
                    });
                }
            });
        </script>
    @endpush
