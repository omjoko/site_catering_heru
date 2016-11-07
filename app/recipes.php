<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class recipes extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];
     public function detail_recipes()
     {
          return $this->hasMany('App\detail_recipes', 'id_resep', 'id');
     }
          public function menus()
     {
          return $this->hasMany('App\menus', 'menu_pembuka', 'id');
          return $this->hasMany('App\menus', 'menu_utama', 'id');
          return $this->hasMany('App\menus', 'menu_penutup', 'id');
     }
}
