<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    //
    protected $table = 'tb_product';
    protected $fillable = ['kdProduct','namaProduk','kdKategori','kdSatuan','hargaJual','diskon','deskripsi','promo', 'urlFoto'];
    protected $primaryKey = 'kdProduct';
    public $incrementing = false;
}
