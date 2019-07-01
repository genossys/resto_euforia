@extends('umum.master')
@section('content')
<section id="tampilmenu" class="container" style="min-height: 500px">

</section>

<!-- Modal Detail Produk -->
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content modalprodukdialog">
                <!-- Modal body -->
                <div class="modal-body modalprodukbody">
                    <div class="modalproduk">
                        <button style="padding-right: 10px" type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                        <div class="jumbotron  panelmodal">
                            <div class="row">
                                <div class="col-sm-5 text-right">
                                    <img id="gambarnew" class="gambarnew img-fluid" src="" alt="">
                                </div>
                                <div class="col-sm-7">
                                    <h5 class="text-white font-weight-bold mb-4" id="namaproduct"></h5>
                                    <p class="text-white" id="deskripsi"></p>

                                    <h2 class="text-white d-inline mb-5">Rp. </h2>
                                    <h2 class="text-white d-inline font-weight-bold " id="hargaJual"></h2>
                                    <br>
                                    <p class="text-white d-inline">off : Rp. </p>
                                    <p class="text-white d-inline" id="diskon"></p>

                                    <div class="tombolpesan">
                                        <p>
                                        </p>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-light btn-number input-plus" data-type="minus" data-field="quant[2]">
                                                    <span>-</span>
                                                </button>
                                            </span>
                                            <input type="text" id="qty" name="quant[2]" class="input-number text-center" value="1" min="1" max="100" style="width: 50px">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-light btn-number input-min" data-type="plus" data-field="quant[2]">
                                                    <span>+</span>
                                                </button>
                                            </span>
                                        </div>
                                        <p></p>
                                        @if (auth()->check())
                                        <button class="btn btn-primary" id="btnSimpan">Tambah Ke Keranjang</button>
                                        @else
                                        <button class="btn btn-primary" onclick="javascript:alert('Anda Harus Login Dulu!')">Tambah Ke Keranjang</button>
                                        @endif

                                    </div>
                                </div>
                            </div>
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
<script src="{{ asset('/js/tampilan/inputnumber.js') }}"></script>

<script>
    $(document).ready(function() {
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
            $('.active').removeClass( 'active' );
            $( this ).addClass( 'active' );
        });
        $("#minuman").on('click', function() {
            pencarianmenu("Minuman");
            $('.active').removeClass( 'active' );
            $( this ).addClass( 'active' );
        });
        $("#snack").on('click', function() {
            pencarianmenu("Snack");
            $('.active').removeClass( 'active' );
            $( this ).addClass( 'active' );
        });
    });
</script>
@endsection
