<?php

namespace App\Http\Controllers\intern;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Literatyre;
use App\User;

use Auth;

class ReadController extends Controller
{
    public function getLiteratyre()
    {
return view('intern.read_literatyre');
}

public function postLiteratyre(Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'literatyre'=>'required',
			'direction'=>'required',
	
		]);

			
		$data=$request->all();

		$readliteratyre = new Literatyre();

		$readliteratyre->literatyre = $request->get('literatyre');
		$readliteratyre->direction = $request->get('direction');
		$readliteratyre->user_id = $currentUser->id;

		$readliteratyre->save();
		return view('intern.read_literatyre');
	}

public function getArchiv() {

		$student = Auth::user();

		// If current auth user not set - abort - page 404
		if (!$student) {
			abort(404);
		}

		// Get all inputforns from DB with student_id == current student id
		$forms = Literatyre::where('user_id', $student->id)->get();
		
		// Add to each form object his user object in user field
		foreach ($forms as &$form) {
			$form->user = User::find($student->id);
		}

		// Add data to data array for view
		$this->data['literatyre'] = $forms;
		$this->data['student'] = $student;

		// Render view
		return view('intern.archiv_literatyre', $this->data);
}



}
