<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
     protected $fillable = ['tema', 'comment','apdate'];


  public function user()
    {
        return $this->hasMany('App\User');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
