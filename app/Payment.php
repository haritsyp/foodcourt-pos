<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id_penjualan','tanggal_pembayaran', 'total_pembayaran',
    ];
}
