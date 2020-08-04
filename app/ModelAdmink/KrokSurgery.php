<?php

namespace App\ModelAdmink;

use Illuminate\Database\Eloquent\Model;

class KrokSurgery extends Model
{
     protected $fillable = ['user_id','vk','bt','bin', 'bs','bak', 'bp','pk','year1', 'year2','kz','ocenka','sum','kafedra'];
}
