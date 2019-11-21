<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formssurgeryday;
use Auth;
use App\User;



class FormssurgerydayController extends Controller
{
	public function Formindex() {
		 $check = 'true';  //Эта переменная из students  чтоб запустился base
	 return view('formssurgeryday',compact('check'));
	}



	public function postAction(Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'viewsurgery'=>'required',
			'num_card'=>'required|:unique:formssurgery',
			'type_work'=>'required'
		]);

			
		$data=$request->all();

		$formssurgeryday = new Formssurgeryday();

		$formssurgeryday->viewsurgery = $request->get('viewsurgery');
	    $formssurgeryday->direction = $request->get('direction');
		$formssurgeryday->num_card = $request->get('num_card');
		$formssurgeryday->type_work = $request->get('type_work');
		$formssurgeryday->apdate = $request->get('apdate');
		$formssurgeryday->num_surgery = $request->get('num_surgery');
		$formssurgeryday->id_student = $currentUser->id;

		$formssurgeryday->save();
		return view('formssurgeryday');
	}


		public function archiveSargeryday ()
		{

	
	
		// Get current auth user-student
		$student = Auth::user();

		// If current auth user not set - abort - page 404
		if (!$student) {
			abort(404);
		}

		// Get all inputforns from DB with student_id == current student id
		$forms = Formssurgeryday::where('id_student', $student->id)->get();
		
		// Add to each form object his user object in user field
		foreach ($forms as &$form) {
			$form->user = User::find($student->id);
		}

		// Add data to data array for view
		$this->data['formssurgeryday'] = $forms;
		$this->data['student'] = $student;

		// Render view
		return view('archive_surgeryday', $this->data);
		}
}



	
