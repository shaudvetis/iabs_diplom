<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use Auth;
use App\User;
class PrintController extends Controller
{
 public function printProfile ()
    {
    	 $check = 'true';  //Эта переменная из students  чтоб запустился base
    	$name_us = Auth::user()->name;
    $auth = User::all()->where('name', $name_us)->first();
    $id_user = $auth->id;
    $details = UserProfile::all()->where('user_id', $id_user)->first();
        return view ('profile_print', compact('details', 'check'));
    }
}