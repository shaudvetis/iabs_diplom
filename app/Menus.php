<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable = [
        'title', 'url','parent_id'
    ];

    public function subMenu()
  {
    return $this->hasMany('App\Menus');//Чтобы вывести подменю
  }

}



