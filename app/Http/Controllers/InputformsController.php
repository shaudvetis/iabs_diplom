<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inputforms;
use Auth;
use User;



class InputformsController extends Controller
{
	public function Formindex() {
	 return view('inputforms');
	}

	public function postAction(Request $request)
	{

		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'diagnoses'=>'required|max:255',
			'num_card'=>'required|:unique:inputforms',
			'apdate'=>'required'
		]);

			
		$data=$request->all();

		$inputForms = new Inputforms();

		$inputForms->diagnoses = $request->get('diagnoses');
		$inputForms->num_card = $request->get('num_card');
		$inputForms->apdate = $request->get('apdate');
		$inputForms->id_student = $currentUser->id;


		$inputForms->save();
		return view('inputforms');
	}



}
