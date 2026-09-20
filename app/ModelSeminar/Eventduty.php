<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class Eventduty extends Model
{
     protected $fillable = ['id', 'vid','priom_id','vid_id','brigada_id','user_id','title','start','end'];


    protected $table = 'eventdutys';

}

  