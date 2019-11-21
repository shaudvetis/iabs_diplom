<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formspracticeday;

use Auth;
use App\User;



class FormspracticedayController extends Controller
{
	public function Practicegetsurgery() {

	 return view('formspracticeday');
	}



	public function Practicesurgery (Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'get_skills'=>'required',
			'sum_number'=>'required'
			
		]);

			
		$data=$request->all();

		$formspracticeday = new Formspracticeday();

		$formspracticeday->get_skills = $request->get('get_skills');
		$formspracticeday->sum_number = $request->get('sum_number');
		$formspracticeday->direction = $request->get('direction');
		$formspracticeday->id_student = $currentUser->id;

		$formspracticeday->save();
		return view('formspracticeday');
	}

	public function practiceday ()
	{
 
		// Get current auth user-student
		$student = Auth::user();

		// If current auth user not set - abort - page 404
		if (!$student) {
			abort(404);
		}

		// Get all inputforns from DB with student_id == current student id
		$forms = Formspracticeday::where('id_student', $student->id)->get();
		
		// Add to each form object his user object in user field
		foreach ($forms as &$form) {
			$form->user = User::find($student->id);
		}

		// Add data to data array for view
		$this->data['formspracticeday'] = $forms;
		$this->data['student'] = $student;

		// Render view
		return view('archiva_practiceday', $this->data);
		
	}
}