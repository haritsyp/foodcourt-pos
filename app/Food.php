<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $primaryKey = 'id_menu';
	public $timestamps = false;
    protected $fillable = [
        'id_stand', 'harga_menu', 'nama_menu',
    ];
}
