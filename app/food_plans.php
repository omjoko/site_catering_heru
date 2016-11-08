<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class food_plans extends Model
{
    public function menus()
    {
        return $this->morphedByMany('App\menus', 'id');
    }

    public function voyages()
    {
    	return $this->belongsTo('App\voyages', 'id_pelayaran');
    }

}
