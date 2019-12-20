<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OcenkiTables extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['user_id', 'id_seminarus','tema'=>'array',
     'element' => 'array', 'bal'=> 'array', 'lessons'=> 'array', 'morning'=> 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function atestatprofile()
    {
        return $this->belongsTo(AtestatProfile::class);
    }
   public function seminartema()
    {
        return $this->belongsTo(SeminarTema::class);
    }

}
