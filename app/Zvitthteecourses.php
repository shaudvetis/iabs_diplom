<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AtestatProfile;
use Illuminate\Foundation\Auth\User;

class Zvitthteecourses extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'user_id', 'direction_id','form', 'course', 'ball','comm', 'updated_at', 'created_at'
            ];

protected $table = 'zvitthteecourses';

    
}