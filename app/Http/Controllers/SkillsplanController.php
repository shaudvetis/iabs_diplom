<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsplanController extends Controller
{
	public function Planoperindex() {
		 $check = 'true';  //Эта переменная из students  чтоб запустился base
	 return view('skillsplan', compact('check'));
	}

 }  
