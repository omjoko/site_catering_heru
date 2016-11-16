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
        return $this->hasMany('App\menus','id' , 'sarapan_eksekutif', 'sarapan_bisnis', 'sarapan_ekonomi1', 'sarapan_ekonomi2');
    }

    public function voyages()
    {
    	return $this->belongsTo('App\voyages', 'id_pelayaran');
    }

}
