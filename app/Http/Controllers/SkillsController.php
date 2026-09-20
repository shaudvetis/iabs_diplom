<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
	public function Surgeryindex() {
		
	 return view('skills');
	}
public function kerivnukskills() {
		
	 return view('admink.kerivnuk.skills');
	}

 }  


