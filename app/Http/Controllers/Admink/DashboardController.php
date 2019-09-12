<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
    	return view('admink.dashboard');
}

}
    
    