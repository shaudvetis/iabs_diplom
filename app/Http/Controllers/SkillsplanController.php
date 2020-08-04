<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lectures;
use App\Memorisplan;

class SkillsplanController extends Controller
{
	public function Planoperindex() {
		
 $data = [];
$this->data['value'] = Memorisplan::find(1);
	 return view('skillsplan',$this->data);
	}

public function skillsplankerivnuk() {
		 $data = [];
//ПОказать самую первую строку в таблице
        $this->data['content'] = Lectures::find(1);
	 return view('admink.kerivnuk.skillsplan',$this->data);
	}


 }  
