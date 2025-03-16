<section class="content-header">
    @if (session('success'))
        <div class="alert alert-success p-1" id="success-alert">
            <i class="fa fa-check-circle-o"></i> {{ session('success') }}
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
</section>
@push('add-js')
    <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 2000);

        setTimeout(function() {
            $('#hapus-alert').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 2000);
    </script>
@endpush
