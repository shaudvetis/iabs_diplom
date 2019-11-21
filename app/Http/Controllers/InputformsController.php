<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inputforms;
use Auth;
use User;


class InputformsController extends Controller
{
    public function Formindex()
    {
         $check = 'true';  //Эта переменная из students  чтоб запустился base
        return view('inputforms',compact('check'));
    }

    public function postAction(Request $request)
    {
        $currentUser = Auth::user();

        $validateData = $request->validate([
            'diagnoses' => 'required',
            'num_card' => 'required|:unique:inputforms',
            'apdate' => 'required',
            'direction'=>'required',
            'fio' => 'required|max:255'
        ]);

        $data = $request->all();

        $inputForms = new Inputforms();

        $inputForms->fio = $request->get('fio');
        $inputForms->diagnoses = $request->get('diagnoses');
        $inputForms->num_card = $request->get('num_card');
        $inputForms->apdate = $request->get('apdate');
        $inputForms->apdate_end = $request->get('apdate_end');
        $inputForms->comm = $request->get('comm');
        $inputForms->direction = $request->get('direction');
        $inputForms->id_student = $currentUser->id;

        $inputForms->save();
        
        return view('inputforms');
    }


}
