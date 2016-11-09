<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class inventorys extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function ingredients()
     {
     	return $this->hasOne('App\ingredients', 'id', 'id_bahan');
     }

     public function requisitions()
     {
     	return $this->belongsTo('App\requisitions', 'id_req');
     }
}
