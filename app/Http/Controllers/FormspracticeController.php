<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Get_skills;

use Auth;
use App\User;



class FormspracticeController extends Controller
{
	public function Practicegetsurgery() {
		
	 return view('formspractice');
	 	}



	public function Practicesurgery (Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'get_skills'=>'required',
			'sum_number'=>'required'
			
		]);

			
		$data=$request->all();

		$formssurgery = new Get_skills();

		$formssurgery->get_skills = $request->get('get_skills');
		$formssurgery->sum_number = $request->get('sum_number');
		$formssurgery->direction = $request->get('direction');
		$formssurgery->id_student = $currentUser->id;

		$formssurgery->save();
		
		return view('formspractice');
	}

	public function archivPractice ()
	{
       // Get current auth user-student
        $student = Auth::user();

        // If current auth user not set - abort - page 404
        if (!$student) {
            abort(404);
        }

        // Get all inputforns from DB with student_id == current student id
        $forms = Get_skills::where('id_student', $student->id)->get();
        
        // Add to each form object his user object in user field
        foreach ($forms as &$form) {
            $form->user = User::find($student->id);
        }

        // Add data to data array for view
        $this->data['get_skills'] = $forms;
        $this->data['student'] = $student;
$check = 'true';  //Эта переменная из students  чтоб запустился base
        // Render view
        return view('archiv_practice', $this->data, compact('check'));

	}
}