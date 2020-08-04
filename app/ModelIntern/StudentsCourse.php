<?php

namespace App\ModelIntern;

use Illuminate\Database\Eloquent\Model;

class StudentsCourse extends Model
{
	protected $fillable = ['id', 'user_id','decatki','course','day','years','kafedra'];
    protected $table = 'students_courses';
}
