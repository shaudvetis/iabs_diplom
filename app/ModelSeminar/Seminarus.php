<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class Seminarus extends Model
{
    protected $fillable = ['direction', 'npp','element','seminar_title','bal','kafedra'];

    protected $table = 'seminarus';

     public function seminarus()
    {
        return $this->belongsTo(Napravlenias::class);
    }
}
