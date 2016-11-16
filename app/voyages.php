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

    public function requisitions()
    {
        return $this->hasOne('App\requisitions' , 'id_pelayaran', 'id');
    }

    public function Waste() {
          return $this->belongsTo('App\Waste', 'id_voyages', 'id');
    }

    public function kapals()
    {
        return $this->hasOne('App\kapals' , 'id', 'id_kapal');
    }

}
