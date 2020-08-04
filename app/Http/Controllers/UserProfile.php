<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id', 'decatki','surname', 'name', 'lastname', 'gender', 'course',
    'surnamefirst', 'fullname_en','kafedra','fl_norm','date_bak',
         'country', 'city', 'village', 'index', 'adress', 'house', 'apartment', 'telm',
         'country1', 'city1', 'village1', 'index1', 'adres1', 'house1', 'apartment1', 
         'country2', 'city2', 'village2', 'index2', 'adres2', 'house2', 'apartment2',  'tel1', 'country3','city3', 'village3','index3','adres3', 'house3', 'apartment3', 'doctor1','tel2','bos', 'boswork', 'boskat', 'country4', 'city4','village4', 'index4','healt1', 'adres4', 'house4', 'tel3','doctor2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
