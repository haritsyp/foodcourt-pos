<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpstand extends Model
{
    protected $table = 'tp_stand';
    protected $primaryKey = 'id_saldo';
    public $timestamps = false;
    //public $incrementing = false;
    protected $fillable = [
        'id_user','saldo', 'tanggal', 'tipe',
    ];
}
