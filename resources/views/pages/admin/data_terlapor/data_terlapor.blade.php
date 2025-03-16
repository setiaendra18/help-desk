@extends('layouts.admin-main')
@section('title',$title)
@push('add-css')
    @section('content')
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border border-primary ">
                    <h3 class="box-title">{{ $title }}</h3>
                    {{-- <form class="form-inline">
                    <input type="date" class="form-control">
                    <button class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Unduh Excel</button>
                </form> --}}
                    <div class="box-tools pull-right">
                        <button class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Unduh Excel</button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tabel_data_terlapor" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Laporan</th>
                                    <th>Jenis Pelanggaran</th>
                                    
                                    <th>Terduga Terlapor</th>
                                    <th>Tanggal Kejadian</th>
                                    <th>Pelapor (Anonim)</th>
                                    <th>Lokasi</th>
                                   
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i < 5; $i++)
                                    <tr>
                                        <td>1</td>
                                        <td>GTT1812
                                        </td>
                                        <td><span class="label label-default">POTENSI KKN</span></td>
                                        <td>gatotkaca</td>
                                        <td>1 Januari 2023
                                        </td>
                                      
                                        <td>Endra Setiawan</td>
                                        <td>
                                            Semin, Gunungkidul, Yogyakarta
                                        </td>
                                      
                                        <td>
                                            <button onclick="viewLaporan()" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endfor
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
                                <h4 class="modal-title">Detail Data Laporan : LPRN/2023/122/11</h4>
                            </div>
                         
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="card bg-info p-3">
                            <div class="card-body p-3">
                                <table class="table  w-100">
                                    <tr>
                                        <th width="400px">Nama Pelapor (anonim)</th>
                                        <td width="40px">:</td>
                                        <td>Endra Setiawan</td>
                                    </tr>
                                    <tr>
                                        <th>E-mail</th>
                                        <td>:</td>
                                        <td>setiaendra18@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telephone</th>
                                        <td>:</td>
                                        <td>081343316931</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <h4><i class="fa fa-history"></i> Riwayat Laporan</h4>
                        <table class="table" id="riwayatLaporan">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jenis Laporan</th>
                                    <th scope="col">Tanggal Laporan</th>
                                    <th scope="col">Tanggal Penyelidikan Selesai</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Otto</td>
                                </tr>
                            </tbody>
                        </table>
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
                $('#tabel_data_terlapor').DataTable({
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
                viewLaporan = () => {
                    $('#viewLaporanModal').modal('show');
                }
             
              
            });
        </script>
    @endpush
