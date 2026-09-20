<?php

namespace App\ModelTeacher;

use Illuminate\Database\Eloquent\Model;

class PlanRozklad extends Model
{
	protected $fillable = ['id', 'user_id','decatki','course','seminar_title','year','date','pract','seminar','ball','comm1','comm2','comm3'];
   
    protected $table = 'planrozklads';
}
        
