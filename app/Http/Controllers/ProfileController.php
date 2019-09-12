<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;

class ProfileController extends Controller
{
	//private $data = [];

	public function profileAction()//($id)
	{
		//$this->data['profileData'] = UserProfile::find($id);
		return view('user_profile'/*, $this->data*/);

		// <input type="email" class="form-control" name=""  id="inputEmail4" placeholder="Email" required value="{$profileData->email}">
	}

	public function userAction() 
	{
		$data=$request->all();

		$userprofile = new UserProfile();

		$userprofile->email = $request->get('email');
		$userprofile->surname = $request->get('surname');
		$userprofile->name = $request->get('name');
		$userprofile->id_student = $currentUser->id;
	    $userprofile->name = $request->get('lastname');  
        $userprofile->gender = $request->get('gender');
        $userprofile->surnamefirst = $request->get('surnamefirst');
        $userprofile->country = $request->get('country');
            
        $userprofile->city = $request->get('city');
            $userprofile->villagevillage = $request->get('village');
            $userprofile->index = $request->get('index');
            $userprofile->adress = $request->get('adress');
            $userprofile->house = $request->get('house');
            $userprofile->apartment = $request->get('apartment');
            $userprofile->telc = $request->get('telc');
            $userprofile->country1 = $request->get('country1');
            
            $userprofile->city1 = $request->get('city1');
            $userprofile->village1 = $request->get('village1');
            $userprofile->index1 = $request->get('index1');
            $userprofile->adres1 = $request->get('adres1');
            $userprofile->house1 = $request->get('house1');
            $userprofile->apartment1 = $request->get('apartment1');
            $userprofile->country2 = $request->get('country2');
            $userprofile->city2 = $request->get('city2');
            $userprofile->village2 = $request->get('village2');
            $userprofile->index2 = $request->get('index2');
            $userprofile->adres2 = $request->get('adres2');
            $userprofile->tel1 = $request->get('tel1');

		$formssurgery->save();
		return view('user_profile');
	}

 }  
