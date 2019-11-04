<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','tipe','pemilik','telp','alamat'
    ];
}
