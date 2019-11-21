<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationalController extends Controller
{
	public function Planoperindex() {
		 $check = 'true';  //Эта переменная из students  чтоб запустился base
	 return view('operational', compact('check'));
	}

 }  