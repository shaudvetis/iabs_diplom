<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class Otdeleniya extends Model
{
  
  protected $fillable = ['id', 'id_baza','name_otdeleniya','id_napravlenie','location_otd','kafedra_id'];

  protected $table = 'otdeleniyas';

   
}