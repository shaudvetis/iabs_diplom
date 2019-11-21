<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Inputforms;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','course','form','kafedra'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isRoot() { 
        return $this->role == 3; 
    }

    public function inputforms()
    {
        return $this->hasMany('App\InputForms');
    }

public function Inputformsday()
    {
        return $this->hasMany('App\Inputformsday');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
public function sp_diplom()
    {
        return $this->hasMany('App\SpDiplom');
    }
   
}


    
