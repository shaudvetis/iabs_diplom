<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class TeacherName extends Model
{
    protected $fillable = ['position', 'namelong','nameshort','comm','personaly','kafedra_id'];

    protected $table = 'teacher_names';
}
