<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class KafedraName extends Model
{
    protected $fillable = ['namelongk', 'nameshortk','kafedra_id','comm','pract_nav','teor_nav','kafedra'];

    protected $table = 'kafedra_names';
}

