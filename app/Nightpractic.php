<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nightpractic extends Model
{
    protected $fillable = ['diagnoses', 'num_card','apdate','fio','work','station', 'station_2','date_work','time_work'];
}
