<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{	

	public function asal()
	{
     	return $this->hasMany('App\pelabuhans', 'id_pelabuhan', 'asal');
	}

	public function tujuan()
	{
     	return $this->hasMany('App\pelabuhans', 'id_pelabuhan', 'tujuan');
	}

	public function transit()
	{
		return $this->hasMany('App\Transit', 'id_rute', 'id');
	}

	public function voyages()
	{
		return $this->belongsTo('App\voyages', 'id_rute', 'id');
	}
}
