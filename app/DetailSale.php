<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSale extends Model
{
    //
    protected $primaryKey = 'id_penjualan';
    protected $table = 'sale_details';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id_penjualan','id_menu', 'qty', 'harga',
    ];
}
