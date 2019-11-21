<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AtestatProfile;
use Illuminate\Foundation\Auth\User;

class Course extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'course_title'
            ];

    /*ЭТО НЕ ПОНЯТНО, ЗАЧЕМ ВАМ
    public function profile()
    {
        return $this->hasOne('App\User');
    }
    */

    //А ВОТ ЭТА СВЯЗЬ БУДЕТ НУЖНА ДЛЯ ОТОБРАЖЕНИЯ - СМ.КОНТРОЛЛЕР 
    public function atestatprofile()
    {
        return $this->hasOne('App\AtestatProfile');
    }

}