<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formssurgery;
use Auth;
use App\User;


class FormssurgeryController extends Controller
{
	public function formssurgery() {
		
	 return view('formssurgery');
	}



	public function postsurgery(Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'viewsurgery'=>'required',
			'num_card'=>'required|:unique:formssurgery',
			'direction'=>'required',
			'type_work'=>'required'
		]);

			
		$data=$request->all();

		$formssurgery = new Formssurgery();

		$formssurgery->viewsurgery = $request->get('viewsurgery');
		$formssurgery->num_card = $request->get('num_card');
		$formssurgery->direction = $request->get('direction');
		$formssurgery->type_work = $request->get('type_work');
		$formssurgery->apdate = $request->get('apdate');
		$formssurgery->num_surgery = $request->get('num_surgery');
		$formssurgery->id_student = $currentUser->id;

		$formssurgery->save();
		return view('formssurgery');
	}

      public function archiveSurgery ()
      {
		
		// Get current auth user-student
		$student = Auth::user();

		// If current auth user not set - abort - page 404
		if (!$student) {
			abort(404);
		}

		// Get all inputforns from DB with student_id == current student id
		$forms = Formssurgery::where('id_student', $student->id)->get();
		
		// Add to each form object his user object in user field
		foreach ($forms as &$form) {
			$form->user = User::find($student->id);
		}

		// Add data to data array for view
		$this->data['formssurgery'] = $forms;
		$this->data['student'] = $student;

		return view('archive_surgery', $this->data);
}
}



	
