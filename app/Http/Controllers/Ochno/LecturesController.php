<?php

namespace App\Http\Controllers\Ochno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lectures;


class LecturesController extends Controller
{
    private $data = [];
    
    public function getLectures()  {
//ПОказать самую первую строку в таблице
        $this->data['content'] = Lectures::find(1);
return view('ochno.lectures',$this->data);
    }

}
