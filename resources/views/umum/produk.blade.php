@extends('umum.master')
@section('content')
<section id="tampilmenu" class="container" style="min-height: 500px">

</section>

<!-- Modal Detail Produk -->
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-0">
                <!-- Modal body -->
                <div class="modal-body p-0">
                    <div class="modalproduk p-0">
                        <button type="button" class="close text-danger pr-2 pt-1" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                        <div class="jumbotron  panelmodal" id="contentmodal">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection


@section('footer')
<section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>


<script>
    function tampilmodal(id) {

        $.ajax({
            type: 'GET',
            url: '/tampilmodal',
            data: {
                id: id,
            },
            success: function(data) {
                $("#contentmodal").html(data.html);
            }
        });
    }


    function pencarianmenu(kategori) {

        var nama = $('#textcari').val();
        $.ajax({
            type: 'GET',
            url: '/cariproduk',
            data: {
                nama: nama,
                kategori: kategori,
            },
            success: function(data) {
                $("#tampilmenu").html(data.html);
            }
        });
    }

    $(window).on("load", function() {
        pencarianmenu("Makanan");
    });

    $("#textcari").on('input', function() {
        pencarianmenu("Makanan");

    });

    $("#makanan").on('click', function() {
        pencarianmenu("Makanan");
        $('.active').removeClass('active');
        $(this).addClass('active');
    });

    $("#minuman").on('click', function() {
        pencarianmenu("Minuman");
        $('.active').removeClass('active');
        $(this).addClass('active');
    });

    $("#snack").on('click', function() {
        pencarianmenu("Snack");
        $('.active').removeClass('active');
        $(this).addClass('active');
    });


</script>
@endsection
