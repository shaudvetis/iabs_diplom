<?php

namespace App;

use App\PracticeSkillsCategory;

use Illuminate\Database\Eloquent\Model;

class PracticeSkill extends Model
{
   public function level()
   {
       return $this->belongsTo(PracticeSkillsCategory::class);
   }
}
