<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurements extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];
}
