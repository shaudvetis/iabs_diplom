<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inputformsday;
use Auth;
use App\User;


class InputformsdayController extends Controller
{
    public function Formindex()
    {
        
        return view('inputformsday');
    }

    public function postAction(Request $request)
    {

        $currentUser = Auth::user();

        //$validateData = $request->validate([
       // // //     'fio'=>'bail|required|max:255',
        //     'direction' => 'required',
        // //     'num_card' => 'required|:unique:inputforms',
        // //     'apdate' => 'required'
        //       ]);

        $data = $request->all();

        $inputFormsday = new Inputformsday();

        $inputFormsday->fio = $request->get('fio');
        $inputFormsday->diagnoses = $request->get('diagnoses');
        $inputFormsday->num_card = $request->get('num_card');
        $inputFormsday->apdate = $request->get('apdate');
        $inputFormsday->apdate_end = $request->get('apdate_end');
        $inputFormsday->comm = $request->get('comm');
        $inputFormsday->direction = $request->get('direction');

        $inputFormsday->id_student = $currentUser->id;


        $inputFormsday->save();
        return view('inputformsday');
    }

    public function getInputDay()

     {
       $data = [];
    
    // Get current auth user-student
      $student = Auth::user();

        // If current auth user not set - abort - page 404
        if (!$student) {
            abort(404);
        }

        // Get all inputforns from DB with student_id == current student id
        $forms = Inputformsday::where('id_student', $student->id)->get();
        
        // Add to each form object his user object in user field
        foreach ($forms as &$form) {
            $form->user = User::find($student->id);
        }

        // Add data to data array for view
        $this->data['inputformsday'] = $forms;
        $this->data['student'] = $student;

        // Render view
        return view('archive_inputday', $this->data);
}


}
