<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formsnight;
use Auth;
use App\User;


class FormsnightController extends Controller
{
    public function Nightsurgery()
    {  
         
        return view('nightwork');
    }

    public function Worksurgery(Request $request)
    {
        $currentUser = Auth::user();

        $validateData = $request->validate([
            'diagnoses' => 'required',
            'apdate' => 'required',
            'fio' => 'required|max:255',
            'work' => 'required',
            'date_arrival' => 'required',
            'time_arrival' => 'required',
            'station' => 'required'

        ]);

        $data = $request->all();

        $formsnight = new Formsnight();

        $formsnight->fio = $request->get('fio');
        $formsnight->diagnoses = $request->get('diagnoses');
        $formsnight->num_card = $request->get('num_card');
        $formsnight->apdate = $request->get('apdate');
        $formsnight->work = $request->get('work');
        $formsnight->date_arrival = $request->get('date_arrival');
        $formsnight->time_arrival = $request->get('time_arrival');
        $formsnight->station = $request->get('station');

       $formsnight->id_student = $currentUser->id;


        $formsnight->save();
        return view('nightwork');
    }

    public function archivNight ()
    {
          // Get current auth user-student
        $student = Auth::user();

        // If current auth user not set - abort - page 404
        if (!$student) {
            abort(404);
        }

        // Get all inputforns from DB with student_id == current student id
        $forms = Formsnight::where('id_student', $student->id)->get();
        
        // Add to each form object his user object in user field
        foreach ($forms as &$form) {
            $form->user = User::find($student->id);
        }

        // Add data to data array for view
        $this->data['formsnight'] = $forms;
        $this->data['student'] = $student;
$check = 'true';  //Эта переменная из students  чтоб запустился base
        // Render view
        return view('archiv_nightwork', $this->data, compact('check'));

    }
}
