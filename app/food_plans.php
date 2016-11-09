<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class food_plans extends Model
{
	 use SoftDeletes;
     protected $dates = ['deleted_at'];

    public function menus()
    {
        return $this->morphedByMany('App\menus', 'id');
    }

    public function voyages()
    {
    	return $this->belongsTo('App\voyages', 'id_pelayaran');
    }

}
