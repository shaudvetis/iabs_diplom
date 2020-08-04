<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Inputformsday extends Model
{
    protected $fillable = ['diagnoses', 'num_card','apdate','fio', 'apdate_end', 'comm', 'direction','oper','type_work'];


    public function user()
    {
        return $this->hasMany('App\User');
    }
}
