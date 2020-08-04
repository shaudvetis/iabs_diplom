<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationalController extends Controller
{
	public function Planoperindex() {
		 
	 return view('operational');
	}
		public function kerivnukoper() {
		 
	 return view('admink.kerivnuk.operational');
	}

 }  