<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class Seminar_Tema extends Model
{
    protected $fillable = ['id_seminar', 'npp','element','tema','pract_nav','teor_nav','kafedra'];

    protected $table = 'seminar_temas';
}
