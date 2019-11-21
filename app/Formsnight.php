<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formsnight extends Model
{
    protected $fillable = ['diagnoses', 'num_card','apdate','fio', 'date_arrival', 'time_arrival','work','station'];
}
