<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formssurgeryday extends Model
{
    protected $fillable = ['viewsurgery', 'num_card','type_work','apdate','num_surgery', 'direction'];
}
