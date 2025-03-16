@extends('layouts.admin-main')
@section('title', $title)
@section('pengaduans', 'active')
@push('add-css')
    @section('content')
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border border-primary ">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="box-title">{{ $title }}</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-7 ">
                                    <form action="{{ route('admin.filter-data') }}" method="GET" class="form-inline">
                                        <div class="form-group">
                                            <label for="start_date">Tanggal Awal :</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Tanggal Akhir :</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Terapkan
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-5  text-right">
                                    {{-- <button class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Tombol </button>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tabelDataPengaduan" class="table table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <td>Kode Unik</td>
                                    <th>Tanggal</th>
                                    <th>Pelapor Kendala</th>
                                    <th>Jenis Laporan</th>
                                    <th>Prioritas laporan</th>
                                    <th>Status Laporan</th>
                                    <th>Petugas Help Desk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduans as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_unik }}
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->nama_pelapor }}</td>
                                        <td>
                                            @if ($data->jenisLaporan->jenis_laporan ?? false)
                                                {{ $data->jenisLaporan->jenis_laporan }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->prioritasLaporan->nama ?? false)
                                                {{ $data->prioritasLaporan->nama }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->status == 'BARU')
                                                <span class="label label-primary">{{ $data->status }}</span>
                                            @elseif ($data->status == 'DITERIMA')
                                                <span class="label label-warning">{{ $data->status }}</span>
                                            @elseif ($data->status == 'DALAM PROSES')
                                                <span class="label label-info">{{ $data->status }}</span><br><br>
                                                <img src="{{ url('public/report/status/'. $data->gambar_proses) }}" width="75px">
                                                @elseif ($data->status == 'TIDAK VALID')
                                                <span class="label label-danger">{{ $data->status }}</span>
                                            @elseif ($data->status == 'SELESAI')
                                                <span class="label label-success">{{ $data->status }}</span><br><br>
                                                <img src="{{ url('public/report/status/'. $data->gambar_selesai) }}" width="75px">
                                                @endif
                                        </td>
                                        <td>
                                            @if ($data->id_user == null)
                                                <span class="label label-default">Belum di verifikasi</span>
                                            @else
                                                {{ $data->pengguna->name }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('public/report/' . $data->file) }}" class="btn btn-info btn-sm"
                                                id="download-btn" target="_blank">
                                                <i class="fa fa-cloud-download "></i>
                                            </a>
                                            <button onclick="updateStatus('{{ $data->id }}')"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                            {{-- <button onclick="editLaporan()" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button> --}}
                                            <button onclick="hapusLaporan('{{ $data->id }}')"
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
        <div class="modal fade" id="viewLaporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h4 class="modal-title">Detail Data Laporan</h4>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <span class="label label-default" id="statusView">LAPORAN BARU</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <table class="table-responsive  w-100">
                            <tr>
                                <th width="400px">Kode Unik Laporan</th>
                                <td width="10px">:</td>
                                <td id="kodeUnikView">-</td>
                            </tr>
                            <tr>
                                <th>Nama Pelapor (anonim)</th>
                                <td>:</td>
                                <td id="pelaporView">-</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>:</td>
                                <td id="emailView">-</td>
                            </tr>
                            <tr>
                                <th>Nomor Telephone</th>
                                <td>:</td>
                                <td id="noTelephoneView">-</td>
                            </tr>
                            <tr>
                                <th>Jenis Pelanggaran</th>
                                <td>:</td>
                                <td id="jenisPelanggaranView">-</td>
                            </tr>
                            <tr class="align-top">
                                <th>Nama Terlapor</th>
                                <td>:</td>
                                <td id="terlaporView">-</td>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Kejadian</th>
                                <td>:</td>
                                <td id="tanggalKejadianView">-</td>
                            </tr>
                            <tr>
                                <th>Waktu Kejadian</th>
                                <td>:</td>
                                <td id="waktuKejadianView">-</td>
                            </tr>
                            <tr colpan="3">
                                <td>
                                    <span class="text-info font-weight-bold">Lokasi kejadian</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>:</td>
                                <td id="provinsiView">-</td>
                            </tr>
                            <tr>
                                <th>Kabupaten/Kota</th>
                                <td>:</td>
                                <td id="kabupatenView">-</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>:</td>
                                <td id="kecamatanView">-</td>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <td>:</td>
                                <td id="desaView">-</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td id="alamatView"> - </td>
                            </tr>
                        </table>
                        <br>
                        <div class="row mt-5 pt-5">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" type="button" class="btn btn-success" id="waLink" target="_blank"><i
                                class="fa fa-whatsapp"></i>
                            Konfirmasi Pelapor </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editLaporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title font-weight-bold">Update Data Laporan</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="box-body">
                                <h5 class="text-warning mt-2 mb-2">DATA PRIBADI</h5>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Pelapor (Anonim)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="gatotkaca">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telephone / Whatsapp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="0813000000" maxlength="13"
                                            minlength="8">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="gatotkaca@gmail.com">
                                    </div>
                                </div>
                                <h5 class="text-warning mt-2 mb-2">DATA PENGADUAN</h5>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Pelanggaran</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" style="width: 100%;" id="jenis_pelanggaran">
                                            <option>Data Sample 1</option>
                                            <option>Data Sample 2</option>
                                            <option>Data Sample 3</option>
                                            <option>Data Sample 4</option>
                                            <option>Data Sample 5</option>
                                            <option>Data Sample 6</option>
                                            <option>Data Sample 7</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Terlapor</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="0813000000" maxlength="13"
                                            minlength="8">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Kejadian</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" placeholder="gatotkaca@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Waktu Kejadian</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" placeholder="gatotkaca@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Uraian Detail Pengaduan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="8" placeholder="Jl. Gatotkaca, Bima, Sakti"></textarea>
                                    </div>
                                </div>
                                <h5 class="text-warning mt-2 mb-2">LOKASI KEJADIAN</h5>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" style="width: 100%;" id="provinsi">
                                            <option>Data Sample 1</option>
                                            <option>Data Sample 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kabupaten/Kota</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" style="width: 100%;" id="kabupaten">
                                            <option>Data Sample 1</option>
                                            <option>Data Sample 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" style="width: 100%;" id="kecamatan">
                                            <option>Data Sample 1</option>
                                            <option>Data Sample 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" placeholder="Jl. Gatotkaca, Bima, Sakti"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">File Pendukung</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control"></input>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-info btn-block"><i
                                                class="fa fa-cloud-download"></i> Unduh</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <div class="alert alert-default mt-3 text-danger" role="alert">
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
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title font-weight-bold">Update Status Laporan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.data-pengaduan-update-status') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Status Laporan</label>
                                    <select class="form-control" name="status" id="statusEdit">
                                        <option value="BARU">LAPORAN BARU</option>
                                        <option value="DITERIMA">LAPORAN DI TERIMA</option>
                                        <option value="DALAM PROSES">LAPORAN SEDANG DALAM PROSES</option>
                                        <option value="SELESAI">LAPORAN SELESAI</option>
                                        <option value="TIDAK VALID">LAPORAN TIDAK VALID</option>
                                    </select>
                                    @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                                </div>
                                <div class="col-md-12">
                                    <!-- Conditional image upload form -->
                                    <div id="imageUploadForm" style="display: none;">
                                        <label>Upload Bukti Gambar</label>
                                        <input type="file" name="image" class="form-control">
                                        @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="idUpdateStatus">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </form>
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
                $("#statusEdit").change(function() {
                    var selectedStatus = $(this).val();
                    if (selectedStatus === "DALAM PROSES" || selectedStatus === "SELESAI") {
                        $("#imageUploadForm").show();
                    } else {
                        $("#imageUploadForm").hide();
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
                var currentDate = new Date().toISOString().slice(0, 10);
                $('#start_date').val(currentDate);
                $('#end_date').val(currentDate);
                /*SELECT 2*/
                $("#jenis_pelanggaran").select2({
                    placeholder: " Pilih Jenis Pelanggaran",
                    allowClear: true
                });
                $("#provinsi").select2({
                    placeholder: " Pilih Provinsi",
                    allowClear: true
                });
                $("#kabupaten").select2({
                    placeholder: " Pilih Kabupaten/Kota",
                    allowClear: true
                });
                $("#kecamatan").select2({
                    placeholder: " Pilih Kecamatan",
                    allowClear: true
                });
                /* END SELECT 2 */
                /*FUNCTION */
                viewLaporan = (id) => {
                    $.ajax({
                        url: '{{ route('admin.data-pengaduan-edit') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        dataType: "JSON",
                        success: function(res) {
                            console.log(res)
                            $('#idUpdateStatus').val(res.id)
                            $('#statusView').text(res.status)
                            $('#kodeUnikView').text(res.kode_unik)
                            $('#pelaporView').text(res.pelapor)
                            $('#emailView').text(res.email)
                            $('#noTelephoneView').text(res.no_telephone)
                            $('#jenisPelanggaranView').text(res.id_jenis)
                            $('#terlaporView').text(res.terlapor)
                            $('#tanggalKejadianView').text(res.tanggal_kejadian)
                            $('#provinsiView').text(res.provinsi)
                            $('#kabupatenView').text(res.kabupaten)
                            $('#kecamatanView').text(res.kecamatan)
                            $('#desaView').text(res.desa)
                            $('#alamatView').text(res.alamat)
                            $('#waktuKejadianView').text(res.waktu_kejadian + " WIB")
                            var phoneNumber = res.no_telephone;
                            phoneNumber = phoneNumber.replace(/^0+/, '');
                            var waLink = "https://wa.me/62" + phoneNumber;
                            $("#waLink").attr("href", waLink);
                            $('#viewLaporanModal').modal('show');
                        }
                    });
                }
                editLaporan = () => {
                    $('#editLaporanModal').modal('show');
                }
                updateStatus = (id) => {
                    $.ajax({
                        url: '{{ route('admin.data-pengaduan-edit') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        dataType: "JSON",
                        success: function(res) {
                            console.log(res.status)
                            $('#idUpdateStatus').val(res.id)
                            $('#statusEdit').val(res.status)
                            $('#updateStatusModal').modal('show');
                        }
                    });
                }
                hapusLaporan = (id) => {
                    console.log(id)
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
                                url: '{{ route('admin.data-pengaduan-destroy') }}',
                                method: "DELETE",
                                data: {
                                    'id': id,
                                    '_token': '{{ csrf_token() }}',
                                },
                                success: function(res) {
                                    console.log(res)
                                    location.reload();
                                },
                            });
                        }
                    })
                }
            });
        </script>
    @endpush
