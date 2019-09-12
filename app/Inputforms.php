<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Inputforms extends Model
{
    protected $fillable = ['diagnoses', 'num_card','apdate'];


  public function user()
    {
        return $this->hasMany('App\User');
    }
}