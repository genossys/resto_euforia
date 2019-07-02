<section class="pt-2">
    <div class="container" data-ride="carousel">
        <div class="row">
            @foreach($menu as $men)
            <div class="col-md-3 mb-4">
                <div class="kartuproduk">
                    <img src="{{asset ('/foto/'.$men->urlFoto)}}" alt="">
                    <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> {{$men->namaProduct}}</a>
                    <div class="hargaproduk">
                        <a> {{formatRupiah($men->hargaJual)}}</a>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" onclick="tampilmodal('{{$men->kdProduct}}')" >Detail</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
