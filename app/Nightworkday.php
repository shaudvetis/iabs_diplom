<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nightworkday extends Model
{
     protected $fillable = ['date_work', 'baza','time_work','station_work','fio','diagnosespriom', 'otkaz','gosp', 'num_cardotkaz','prichina','manipulaciiotkaz','type_workotkaz','num_card','work','type_workgosp','fiostacionar','num_cardstacionar', 'diagnosesstac', 'oper','type_workstac', 'id_student','direction'];
}
