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
}
