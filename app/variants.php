<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class variants extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function ingredients()
     {
     	return $this->belongsTo('App\ingredients', 'id_bahan');
     }
}
