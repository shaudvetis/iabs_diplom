<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formssurgery;
use Auth;



class FormssurgeryController extends Controller
{
	public function formssurgery() {
	 return view('formssurgery');
	}



	public function postsurgery(Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'viewsurgery'=>'required|max:255',
			'num_card'=>'required|:unique:formssurgery',
			'type_work'=>'required'
		]);

			
		$data=$request->all();

		$formssurgery = new Formssurgery();

		$formssurgery->viewsurgery = $request->get('viewsurgery');
		$formssurgery->num_card = $request->get('num_card');
		$formssurgery->type_work = $request->get('type_work');
		$formssurgery->id_student = $currentUser->id;

		$formssurgery->save();
		return view('formssurgery');
	}


		
}



	
