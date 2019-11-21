<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimetableofController extends Controller
{
    public function getTime(){
    	return view('admink.timetableof');
}

}
    