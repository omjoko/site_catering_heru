<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class measurements extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];
     public function resep()
     {
      	return $this->hasMany('App\ingredients', 'satuan_resep', 'id');
     }
     public function pembelian()
     {
      	return $this->hasMany('App\ingredients', 'satuan_pembelian', 'id');

     }
}
