<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class invoices extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function detail_invoices()
     {
          return $this->hasMany('App\detail_invoices', 'id_invoices', 'id');
     }

     public function req()
     {
          return $this->hasOne('App\requisitions', 'id', 'id_requisitions');
     }

     public function vendor()
    {
     return $this->belongsTo('App\invoices' , 'id');
    }


}
