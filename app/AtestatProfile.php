<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtestatProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['user_id', 'course_title'=>'array',
     'credits' => 'array', 'hours'=> 'array', 'marks'=> 'array', 
    'nac_grade'=> 'array', 'ects_grade'=> 'array','course_title'=> 'array','id_name'=> 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
