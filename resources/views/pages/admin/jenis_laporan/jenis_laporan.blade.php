@extends('layouts.admin-main')
@push('add-css')
@endpush
@section('title',$title)
@section('jenis-laporan','active')
@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border border-primary ">
                <h3 class="box-title">Tabel {{ $title }}</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-success btn-sm" onclick="tambahDataPelanggaran()"><i class="fa fa-plus"></i>
                        Tambah Data</button>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="tabelDataPengaduan" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Laporan</th>
                                <th>Deskripsi</th>
                                <th>Status </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis_laporans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->jenis_laporan }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>
                                        @if ($data->status == 'AKTIF')
                                            <i class="fa fa-check-circle-o text-success"></i> AKTIF</a>
                                        @else
                                            <i class="fa fa-close text-danger "></i> NON-AKTIF</a>
                                        @endif
                                    </td>
                                    <td>
                                        <button onclick="editJenisLaporan('{{ $data->id }}')"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="hapusJenisLaporan('{{ $data->id }}')"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
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
    <div class="modal fade" id="tambahDataJenisLaporanModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title font-weight-bold">Tambah Data Jenis Laporan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST"
                        action="{{ route('admin.master.jenis-laporan-store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Laporan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="gatotkaca"
                                        name="jenis_laporan" value="{{ old('jenis_laporan') }}">
                                    @error('jenis_laporan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Deskripsi Jenis Laporan"name="deskripsi">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="AKTIF">AKTIF</option>
                                        <option value="NONAKTIF">NON-AKTIF</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editJenisLaporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title font-weight-bold">Update Jenis Laporan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ route('admin.master.jenis-laporan-update') }}">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Laporan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jenis_laporan" id="jenis_laporanEdit"
                                        class="form-control" placeholder="gatotkaca"n>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" id="deskripsiEdit" class="form-control" rows="3"
                                        placeholder="Deskripsi Jenis Laporan"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control" id="statusEdit">
                                        <option value="AKTIF">AKTIF</option>
                                        <option value="NONAKTIF">NON-AKTIF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    {{-- Input Hidden Sections --}}
                    <input type="hidden" name="id" id="idEdit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('add-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /*DATA TABLE */
            $('#tabelDataPengaduan').DataTable({
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
            /*FUNCTION */
            tambahDataPelanggaran = (id) => {
                $('#tambahDataJenisLaporanModal').modal('show');
            }
            editJenisLaporan = (id) => {
                $.ajax({
                    url: '{{ route('admin.master.jenis-laporan-edit') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    dataType: "JSON",
                    success: function(res) {
                        $('#idEdit').val(res.id)
                        $('#jenis_laporanEdit').val(res.jenis_laporan);
                        $('#deskripsiEdit').val(res.deskripsi);
                        $('#statusEdit').val(res.status);
                        $('#editJenisLaporanModal').modal('show');
                    }
                });
            }
            hapusJenisLaporan = (id) => {
                Swal.fire({
                    title: 'Perhatian',
                    text: "Apakah anda yakin akan riwayat data Tersebut ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.master.jenis-laporan-destroy') }}",
                            method: "DELETE",
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'id': id
                            },
                            success: function(res) {
                                if (res.success) {
                                    console.log('{{ Session::get('hapus') }}');
                                } else {
                                    console.log('{{ Session::get('error') }}');
                                }
                                location.reload();
                            }
                        });
                    }
                })
            }
        });
    </script>
@endpush
