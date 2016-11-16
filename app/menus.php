<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class menus extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function bahan()
     {
     	return $this->belongsTo('App\ingredients', 'minuman');
     }

     public function resep()
     {
     	return $this->belongsTo('App\recipes', 'menu_pembuka');
     	return $this->belongsTo('App\recipes', 'menu_utama');
     	return $this->belongsTo('App\recipes', 'menu_penutup');
     	return $this->belongsTo('App\recipes', 'menu_penutup');
     }

     public function food_plans()
    {
        return $this->belongsTo('App\food_plans', 'id');
    }
}
