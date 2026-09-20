<?php

namespace App\ModelAdmink;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
   protected $fillable = ['id', 'curdate','daymont','montyear','nyear','ndayweek','typedat'];
}

