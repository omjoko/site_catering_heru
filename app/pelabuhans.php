<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelabuhans extends Model
{
    public function rute()
    {
     	return $this->belongsToMany('App\Rute');
    	
    }

    public function transit()
    {
    	return $this->hasOne('App\Transit', 'id_pelabuhan', 'id_pelabuhan');
    }
}
