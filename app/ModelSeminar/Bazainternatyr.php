<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class Bazainternatyr extends Model
{
  
  protected $fillable = ['id', 'name_baza','id_napravlenie','form_ducation','name_town','name_education','kafedra_id'];

  protected $table = 'bazainternatyrs';

}

