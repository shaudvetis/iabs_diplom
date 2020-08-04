<?php

namespace App\ModelTeacher;

use Illuminate\Database\Eloquent\Model;

class Testirovanie extends Model
{
      protected $fillable = ['user_id', 'direction','all_bal','proc1','proc2','proc3', 'proc4'];
}
