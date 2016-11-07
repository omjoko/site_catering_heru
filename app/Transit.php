<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    public function rutes()
     {
     	return $this->belongsTo('App\Rute', 'id_rute');
     }

     public function pelabuhans()
     {
     	return $this->belongsTo('App\pelabuhans', 'id_pelabuhan');
     }
}
