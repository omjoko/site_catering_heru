<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kapals extends Model
{
    public function storages()
     {
          return $this->hasMany('App\storages', 'id_kapal', 'id');
     }

     public function voyages() {
          return $this->belongsTo('App\voyages', 'id_kapal', 'id');
    }
}
