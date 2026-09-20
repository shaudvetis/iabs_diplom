<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colordirection extends Model
{
    protected $fillable = [
        'id', 'name_color','nam_napravlenie'
    ];

    protected $table = 'color_directions';
}

