<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Inputforms;
use App\User;
use App\Get_skills;
use DB;
use Auth;



class ArchiveController extends Controller
{	
	private $data = [];
	
	public function ArchiveAction() {

		// Get current auth user-student
		$student = Auth::user();

		// If current auth user not set - abort - page 404
		if (!$student) {
			abort(404);
		}

		// Get all inputforns from DB with student_id == current student id
		$forms = Inputforms::where('id_student', $student->id)->get();
		
		// Add to each form object his user object in user field
		foreach ($forms as &$form) {
			$form->user = User::find($student->id);
		}

		// Add data to data array for view
		$this->data['inputforms'] = $forms;

		// Render view
		return view('archive', $this->data);



		
	}



	
 }  
в шаблоне $inputform->name
 $inputforms = DB::table ('inputforms')
	->join('users', 'inputforms.id_student', '=', 'users.id')->select('inputforms.*', 'users.name')->get();
	 return view('archive', ['inputforms'=> $inputforms]);