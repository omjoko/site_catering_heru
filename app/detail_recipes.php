<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class detail_recipes extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];
}
