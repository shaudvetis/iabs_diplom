<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inputforms;
use App\Formssurgery;
use App\Get_skills;
use App\User;
use DB;


class FirstController extends Controller
{

    public function Firstindex()
    {

        $firstindex = Inputforms::all();
        return view('firstgrade', compact('firstindex'));

    }


    public function Firstcoursen()
    {
        //добовляем отошения двух таблиц
        //$students = Inputforms::user();

        $firstcoursen = Get_skills::all();
        return view('firstcoursen', compact('firstcoursen'));


    }


    public function Surgerycoursen()
    {

        $surgerycoursen = Formssurgery::all();
        return view('surgerycoursen', compact('surgerycoursen'));
    }

}

	
	

		
