<?php

namespace App\ModelAdmink;

use Illuminate\Database\Eloquent\Model;

class KrokSurgery extends Model
{
     protected $fillable = ['user_id','vk','vk_nb','pr', 'pr_nb','kk', 'kk_nb','zalik','all_nb','kafedra'];
}
