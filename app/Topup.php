<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
	protected $table = 'top_up';
    protected $primaryKey = 'id_saldo';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable = [
        'id_user','saldo', 'tanggal', 'tipe',
    ];
}
