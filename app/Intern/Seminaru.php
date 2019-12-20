<?php

namespace App\Intern;

use Illuminate\Database\Eloquent\Model;

class Seminaru extends Model
{
    protected $fillable = [
      'seminar_title','id'
        ];

     public function seminartema()
    {
        return $this->hasOne('App\Intern\SeminarTema');
    }
}




