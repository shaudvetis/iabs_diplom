<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controlmodyl extends Model
{
    protected $fillable = ['user_id', 'id_seminarus','one'=>'array',
     'two' => 'array', 'three'=> 'array', 'four'=> 'array','five'=> 'array', 'six'=> 'array', 'seven'=> 'array', 'eight'=> 'array','nine'=> 'array','ten'=> 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userprofiles()
    {
        return $this->belongsTo(UserProfile::class);
    }
  
}
