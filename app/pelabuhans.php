<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelabuhans extends Model
{
    public function asal_rute()
    {
		return $this->belongsTo('App\voyages', 'asal', 'id_pelabuhan');
    }

    public function tujuan_rute()
    {
		return $this->belongsTo('App\voyages', 'tujuan', 'id_pelabuhan');
    }

    public function transit()
    {
    	return $this->hasOne('App\Transit', 'id_pelabuhan', 'id_pelabuhan');
    }
}
