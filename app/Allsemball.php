<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allsemball extends Model
{
     protected $fillable = ['id','user_id','direction','allseminar','kyracia', 'test','allball', 'ects','ballfinish','comment','courses', 'decatki'];


         protected $table = 'allsemballs';

}
