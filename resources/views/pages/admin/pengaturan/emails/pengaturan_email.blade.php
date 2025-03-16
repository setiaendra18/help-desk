@extends('layouts.admin-main')
@push('add-css')
@endpush
@section('title', $title)
@section('pengaturan-email', 'active')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <section class="content">
                <div class="alert alert-danger">

                   Siapkan Mail Server sesuai dengan kebutuhan pengaturan di bawah , untuk dapat mengirim kode unik ke email pelapor
                  </div>

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border border-primary ">

                    </div>
                    <div class="box-body">

                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-gear"></i> Pengaturan
                                       Mail Server</a>
                                </li>
                                {{-- <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-envelope-o"></i> SMTP Server</a></a></li> --}}
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">

                                    @include('pages.admin.pengaturan.emails.form_pengaturan_email')
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
@endsection
@push('add-js')
    <script type="text/javascript">
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
