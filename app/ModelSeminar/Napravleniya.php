<?php

namespace App\ModelSeminar;

use Illuminate\Database\Eloquent\Model;

class Napravleniya extends Model
{
    protected $fillable = ['id', 'direction'];

    protected $table = 'napravlenias';

     public function napravlenias()
    {
        return $this->hasMany(Seminarus::class);
    }
}

