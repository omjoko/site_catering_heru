<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requisitions extends Model
{
    public function vendors()
    {
    	return $this->belongsTo('App\vendors' , 'vendor');
    }

    public function voyages()
    {
    	return $this->belongsTo('App\voyages' , 'id_pelayaran');
    }
}
