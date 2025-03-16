
<script src="{{ url('public/template/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('public/template/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('public/template/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('public/template/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/template/admin/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/template/admin/js/demo.js') }}"></script>
<script src="{{ url('public/template/admin/js/sweetalert2.js') }}"></script>
<link rel="stylesheet" href="{{ url('public/template/admin/plugins/iCheck/square/blue.css') }}">
<script src="{{ url('public/template/admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ url('public/template/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/template/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}">
</script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
    
  })
</script>


@stack('add-js')

