<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class detail_requisitions extends Model
{
	use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function ingredients()
      {
      	return $this->hasMany('App\ingredients', 'id', 'id_bahan');
      } 
}
