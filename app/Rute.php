<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{	

	public function pelabuhan()
	{
     	return $this->belongsToMany('App\pelabuhans');
	}

	public function transit()
	{
		return $this->hasMany('App\Transit', 'id_rute', 'id');
	}
}
