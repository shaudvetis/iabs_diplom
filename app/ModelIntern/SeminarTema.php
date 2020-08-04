<?php

namespace App\Intern;

use Illuminate\Database\Eloquent\Model;

class SeminarTema extends Model
{
    protected $fillable = [
      'id_seminar', 'tema'
            ];

            //А ВОТ ЭТА СВЯЗЬ БУДЕТ НУЖНА ДЛЯ ОТОБРАЖЕНИЯ - СМ.КОНТРОЛЛЕР 
    public function ocenkitables()
    {
        return $this->hasOne('App\OcenkiTables');
    }
}
