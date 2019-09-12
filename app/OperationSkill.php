<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationSkill extends Model
{
    public function category()
    {
        return $this->belongsTo(OperationSkillsCategory::class);
    }
}
