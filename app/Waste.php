<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    public function voyages()
     {
        return $this->hasMany('App\voyages','id', 'id_voyages');
     }
}
