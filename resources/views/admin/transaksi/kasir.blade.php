@extends('admin.master')

@section('judul')
Kasir
@endsection

@section('content')

<section class="pt-3"
    <div class="container">
        <div class="table-responsive-lg">
            <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Transaksi</th>
                        <th>Customer</th>
                        <th>Total Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/daterangepicker/daterangepicker-bs3.css')}}">
@endsection


@section('script')
<!-- date-range-picker -->
<script src="{{asset ('/js/moment-with-locales.js')}}"></script>
<script src="{{asset ('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(function() {
        //Date range picker
        $('#tglLaporan').daterangepicker()


    });
</script>

@endsection
