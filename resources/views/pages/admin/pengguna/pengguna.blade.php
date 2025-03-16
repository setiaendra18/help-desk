@extends('layouts.admin-main')
@push('add-css')
@endpush
@section('title', $title)
@section('pengguna', 'active')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border border-primary ">
                <h3 class="box-title">Tabel {{ $title }}</h3>
                <div class="box-tools pull-right">

             <button class="btn btn-primary btn-sm" onclick="addPengguna()"><i class="fa fa-plus"></i>
                        Tambah Data</button>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="tabelDataPengguna" class="table table-bordered table-striped nowrap">
                        <thead>
                            <tr>
                                <th>No</th>


                                <th class="bg-success text-white">NAMA LENGKAP</th>
                                <th class="bg-success text-white">USERNAME</th>
                                <th class="bg-success text-white">E-MAIL</th>
                                <th class="bg-success text-white">TELEPHONE</th>
                                <th class="bg-danger text-white">LEVEL</th>
                                <th class="bg-danger text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $data)
                                <tr >
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $data->name }}
                                    </td>
                                    <td>
                                        {{ $data->username }}
                                    </td>
                                    <td>
                                        {{ $data->email }}
                                    </td>
                                    <td>
                                        {{ $data->telephone }}
                                    </td>


                                    <td>
                                        @if ($data->level == 'superadmin')
                                            <span class="label label-danger"><i class="fa fa-lock"></i> SUPERADMIN</span>
                                        @else
                                            <span class="label label-default">ADMIN</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->id == auth()->user()->id)
                                            <button onclick="rubahPassword('{{ $data->id }}')"
                                                class="btn btn-dark btn-sm">
                                                <i class="fa fa-key"></i>
                                            </button>
                                        @endif
                                        <button onclick="editPengguna('{{ $data->id }}')"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="hapusPengguna('{{ $data->id }}')"
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
    @include('pages.admin.pengguna.modal')
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
            $('#tabelDataPengguna').DataTable({
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
           addPengguna = () => {
                $('#tambahPengguna').modal('show');
            }
            editPengguna = (id) => {
                console.log(id)
                $.ajax({
                    url: '{{ route('admin.pengguna-edit') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    dataType: "JSON",
                    success: function(res) {
                        $('#idEdit').val(res.id)

                        $('#nameEdit').val(res.name);

                        $('#emailEdit').val(res.email);
                        $('#telephoneEdit').val(res.telephone);


                        $('#editPenggunaModal').modal('show');
                    }
                });
            }
            hapusPengguna = (id) => {
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
                                url: "{{ route('admin.pengguna-destroy') }}",
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
                },
                rubahPassword = (id) => {
                    $.ajax({
                        url: '{{ route('admin.pengguna-edit') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        dataType: "JSON",
                        success: function(res) {
                            $('#rubahPasswordModal').modal('show');
                        }
                    });
                },
                function validatePassword() {
                    var password = $("#password").val();
                    var confirmPassword = $("#password_confirmation").val();

                    if (password !== confirmPassword) {
                        $("#password_confirmation")[0].setCustomValidity("Konfirmasi password tidak sesuai.");
                    } else {
                        $("#password_confirmation")[0].setCustomValidity("");
                    }
                }

            $("#password").on("change", validatePassword);
            $("#password_confirmation").on("keyup", validatePassword);
        });
    </script>
@endpush
