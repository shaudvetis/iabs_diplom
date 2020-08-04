<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AtestatProfile;
use App\Course;

class DiplomController extends Controller
{
    public function getDiplom(AtestatProfile $details)
    {
    	return view('admink.atestat_profiles', compact('details'));    	
    }
     

}

