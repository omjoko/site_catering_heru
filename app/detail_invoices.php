<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class detail_invoices extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];

     public function invoices()
     {
     	return $this->belongsTo('App\invoices', 'id_invoices');
     }
}
