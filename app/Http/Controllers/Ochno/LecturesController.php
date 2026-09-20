<?php

namespace App\Http\Controllers\Ochno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lectures;
use App\Topclasses;


class LecturesController extends Controller
{
    private $data = [];
    
    public function getLectures()  {
//ПОказать самую первую строку в таблице
        $this->data['content'] = Lectures::find(1);

 $plan = [];
$this->plan['contents'] = Topclasses::find(1);
		
return view('ochno.lectures',$this->data,$this->plan);
    }


    
    public function kerivnukLectures()  {
    	    $data = [];
//ПОказать самую первую строку в таблице
        $this->data['content'] = Lectures::find(1);
return view('admink.kerivnuk.lectures',$this->data);
    }

}
