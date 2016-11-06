<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ingredients extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];
     public function categorys()
     {
     	return $this->belongsTo('App\categorys', 'id_kategori');
     }
     public function resep()
     {
     	return $this->belongsTo('App\measurements', 'satuan_resep');
     }
     public function pembelian()
     {
     	return $this->belongsTo('App\measurements', 'satuan_pembelian');
     }
}
