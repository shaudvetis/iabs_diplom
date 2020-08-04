<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastOnline extends Model
{
     protected $fillable = [
        'id', 'user_id', 'last_online_at', 'created_at', 'updated_at' ];

     

      protected $casts = ["last_online_at" => "datetime"];
}
