<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class voyages extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function rutes()
     {
     	return $this->hasOne('App\Rute','id', 'id_rute');
     }

}
