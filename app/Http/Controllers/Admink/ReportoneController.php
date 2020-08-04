<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportoneController extends Controller
{
    public function getReport(){
    	return view('admink.reportoneochno');
}

}