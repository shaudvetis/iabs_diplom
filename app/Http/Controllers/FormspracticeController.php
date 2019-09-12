<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Get_skills;

use Auth;



class FormspracticeController extends Controller
{
	public function Practicegetsurgery() {
	 return view('formspractice');
	}



	public function Practicesurgery (Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'get_skills'=>'required|max:255',
			'sum_number'=>'required'
			
		]);

			
		$data=$request->all();

		$formssurgery = new Get_skills();

		$formssurgery->get_skills = $request->get('get_skills');
		$formssurgery->sum_number = $request->get('sum_number');
		$formssurgery->id_student = $currentUser->id;

		$formssurgery->save();
		return view('formspractice');
	}
}