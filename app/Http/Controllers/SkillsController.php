<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
	public function Surgeryindex() {
		 $check = 'true';  //Эта переменная из students  чтоб запустился base
	 return view('skills',compact('check'));
	}

 }  


