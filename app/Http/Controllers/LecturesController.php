<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lectures;
use Auth;
use User;


class LecturesController extends Controller
{
    public function getLectures()
    {
         $check = 'true';  //Эта переменная из students  чтоб запустился base
        return view('lectures',compact('check'));
    }

    public function updateLectures(Request $request)
    {
        $currentUser = Auth::user();

        // $validateData = $request->validate([
        //     'comment' => 'required',
        //     'tema' => 'required|:unique:inputforms',
        //     'apdate' => 'required',
            
        // ]);

        $data = $request->all();

        $inputForms = new Lectures();

        $inputForms->apdate = $request->get('apdate');
        $inputForms->tema = $request->get('tema');
        $inputForms->comment = $request->get('comment');
        $inputForms->id_student = $currentUser->id;


        $inputForms->save();
        return view('lectures');
    }


}
