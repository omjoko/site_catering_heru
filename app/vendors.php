<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendors extends Model
{
    public function requisitions()
    {
    	return $this->hasone('App\vendors' , 'vendor' , 'id');
    }
}
