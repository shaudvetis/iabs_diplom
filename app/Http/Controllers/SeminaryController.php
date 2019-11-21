<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsextrController extends Controller
{
	public function studentextrdIndex() {
		 $check = 'true';  //Эта переменная из students  чтоб запустился base
	 return view('seminary',compact('check'));
	}

 }  
