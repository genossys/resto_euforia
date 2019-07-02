<div class="row">
    @foreach($menu as $men)
    <div class="col-sm-5 text-right">
        <img id="gambarnew" class="gambarnew img-fluid" src="{{asset ('/foto/'.$men->urlFoto)}}" alt="">
    </div>
    <div class="col-sm-7">
        <h5 class="text-dark font-weight-bold mb-4" id="namaproduct">{{$men->namaProduct}}</h5>
        <p class="text-dark" id="deskripsi">{{$men->deskripsi}}</p>

        <h2 class="text-dark d-inline mb-5">Rp. {{$men->hargaJual}}</h2>


        <div class="tombolpesan">
            <p>
            </p>
            <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-number input-plus" data-type="minus" data-field="quant[2]">
                        <span><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                    </button>
                </span>
                <input type="text" id="qty" name="quant[2]" class="input-number text-center" value="1" min="1" max="100" style="width: 50px">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-number input-min" data-type="plus" data-field="quant[2]">
                        <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                    </button>
                </span>
            </div>
            <p></p>
            <button class="btn btn-primary" id="btnSimpan">Tambah Ke Pesanan</button>


        </div>
    </div>
    @endforeach
</div>

<script src="{{ asset('/js/tampilan/inputnumber.js') }}"></script>

