<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonSetting extends Model
{
    protected $fillable = [
        'name', 'value'
    ];
}

