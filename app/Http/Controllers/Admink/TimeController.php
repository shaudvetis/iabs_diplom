<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use Auth;

class TimeController extends Controller
{
    public function getTime()
    {
    	return view('admink.timetableone');    	
    }
    
    
}