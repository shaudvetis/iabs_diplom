<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TeacherController extends Controller
{
	public function Teacherindex() {
	 return view('admink.teacher.teacher');
	}

 }  

