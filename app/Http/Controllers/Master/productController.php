<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\productModel;

class productController extends Controller
{
    //
    public function index()
    {
        $productPromo = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'deskripsi', 'promo', 'urlFoto')
            ->where('promo', '=', 'Y')
            ->get();

        $productNonPromo = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'deskripsi', 'promo', 'urlFoto')
            ->where('promo', '=', 'T')
            ->get();

        return view('/umum/produk')->with(['productPromo' => $productPromo, 'productNonPromo' => $productNonPromo]);
    }

    public function cariproduk(Request $request)
    {
        $menu = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'deskripsi', 'promo', 'urlFoto')
            ->where([
                ['namaProduct', 'like', '%' . $request->nama . '%'],
                ['kdKategori', 'like', '%' . $request->kategori . '%',]
            ])
            ->get();

        $contoh = $menu->first();

        if ($contoh != null) {
            $returnHTML = view('isipage.menu')->with('menu', $menu)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isipage.produkkosong')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }
}
