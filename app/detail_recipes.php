<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class detail_recipes extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function recipes()
     {
     	return $this->belongsTo('App\recipes', 'id_resep');
     }

     public function bahan()
     {
     	return $this->belongsTo('App\ingredients', 'id_bahan');
     }

}
