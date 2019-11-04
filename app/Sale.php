<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'id_penjualan';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id_penjualan','id_stand', 'tanggal_penjualan', 'total_penjualan',
    ];
}
