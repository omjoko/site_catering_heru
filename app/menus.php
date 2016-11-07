<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class menus extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function minuman()
     {
     	return $this->belongsTo('App\ingredients', 'minuman');
     }

     public function resep()
     {
     	return $this->belongsTo('App\recipes', 'menu_pembuka');
     	return $this->belongsTo('App\recipes', 'menu_utama');
     	return $this->belongsTo('App\recipes', 'menu_penutup');

     }
}
