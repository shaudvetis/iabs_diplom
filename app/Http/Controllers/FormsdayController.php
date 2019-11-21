<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Nightworkday;
use Auth;
use App\User;
use App\Nightpractic;


class FormsdayController extends Controller
{
    public function Getsurgery()
    {
       
        return view('nightworkday');
    }

    public function Postsurgery(Request $request)
    {
        $currentUser = Auth::user();

        // $validateData = $request->validate([
        //     'diagnoses' => 'required',
        //     'apdate' => 'required',
        //     'fio' => 'required|max:255',
        //     'work' => 'required',
        //     'practic' => 'required',
        //     'date_arrival' => 'required',
        //     'time_arrival' => 'required',
        //     'station' => 'required|max:255'

        // ]);

        $data = $request->all();

        $nightworkday = new Nightworkday();

        $nightworkday->fio = $request->get('fio');
        $nightworkday->practic = $request->get('practic');
        $nightworkday->diagnoses = $request->get('diagnoses');
        $nightworkday->num_card = $request->get('num_card');
        $nightworkday->apdate = $request->get('apdate');
        $nightworkday->work = $request->get('work');
        $nightworkday->station = $request->get('station');
        $nightworkday->date_arrival = $request->get('date_arrival');
        $nightworkday->time_arrival = $request->get('time_arrival');
        $nightworkday->id_student = $currentUser->id;


        $nightworkday->save();
        return view('nightworkday');
    }

public function archiveNightday ()
{

        $student = Auth::user();

        // If current auth user not set - abort - page 404
        if (!$student) {
            abort(404);
        }

        // Get all inputforns from DB with student_id == current student id
        $forms = Nightworkday::where('id_student', $student->id)->get();
        
        // Add to each form object his user object in user field
        foreach ($forms as &$form) {
            $form->user = User::find($student->id);
        }

        // Add data to data array for view
        $this->data['nightworkday'] = $forms;
        $this->data['student'] = $student;

        // Render view
        return view('archive_nightday', $this->data);

}

public function getPractic(Request $request)
    {
        $currentUser = Auth::user();

        $validateData = $request->validate([
            'diagnoses' => 'required',
            'apdate' => 'required',
            'fio' => 'required|max:255',
            'work' => 'required',
            'practic' => 'required',
            'station' => 'required'

        ]);

        $data = $request->all();

        $formspractic = new Nightpractic();

        $formspractic->fio = $request->get('fio');
        $formspractic->diagnoses = $request->get('diagnoses');
        $formspractic->num_card = $request->get('num_card');
        $formspractic->apdate = $request->get('apdate');
        $formspractic->work = $request->get('work');
        $formspractic->station = $request->get('station');
         $formspractic->practic = $request->get('practic');

       $formspractic->id_student = $currentUser->id;

        $formspractic->save();

        return view('nightworkday');
    }

public function archiveNightpract ()
{

        $student = Auth::user();

        // If current auth user not set - abort - page 404
        if (!$student) {
            abort(404);
        }

        // Get all inputforns from DB with student_id == current student id
        $forms = Nightpractic::where('id_student', $student->id)->get();
        
        // Add to each form object his user object in user field
        foreach ($forms as &$form) {
            $form->user = User::find($student->id);
        }

        // Add data to data array for view
        $this->data['nightpractic'] = $forms;
        $this->data['student'] = $student;

        // Render view
        return view('archive_nightpractice', $this->data);

}


}
