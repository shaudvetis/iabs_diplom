<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use Auth;
use App\User;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
	//private $data = [];

	public function profileAction()//($id)
	{

	$name_us = Auth::user()->name;
    $auth = User::all()->where('name', $name_us)->first();
    $id_user = $auth->id;
    $details = UserProfile::all()->where('user_id', $id_user)->first();

if($details === NULL) {
    $check = 'true';  
        }
        else{
         $check  = 'false';
        }
 return view('user_profile', compact('details', 'check'));

		// <input type="email" class="form-control" name=""  id="inputEmail4" placeholder="Email" required value="{$profileData->email}">
	}

	public function userAction(Request $request)
	{
        $currentUser = Auth::user();
        $data=$request->all();
		$userprofile = new UserProfile();
		$userprofile->surname = $request->get('surname');
		$userprofile->name = $request->get('name');
		$userprofile->user_id = $currentUser->id;
	    $userprofile->lastname = $request->get('lastname');
        $userprofile->gender = $request->get('gender');
        $userprofile->surnamefirst = $request->get('surnamefirst');
        $userprofile->fullname_en = $request->get('fullname_en');
        $userprofile->kafedra = $request->get('kafedra');
        $userprofile->date_bak = $request->get('date_bak');
        $userprofile->fl_norm = $request->get('fl_norm');
        $userprofile->course = $request->get('course');
        $userprofile->decatki = $request->get('decatki');
        $userprofile->country = $request->get('country');
        $userprofile->city = $request->get('city');
        $userprofile->village = $request->get('village');
        $userprofile->index = $request->get('index');
        $userprofile->adress = $request->get('adress');
        $userprofile->house = $request->get('house');
        $userprofile->apartment = $request->get('apartment');
        $userprofile->telm = $request->get('telm');
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
        $userprofile->house2 = $request->get('house2');
        $userprofile->apartment2 = $request->get('apartment2');
        $userprofile->tel1 = $request->get('tel1');
        $userprofile->country3 = $request->get('country3');
        $userprofile->city3 = $request->get('city3');
        $userprofile->village3 = $request->get('village3');
        $userprofile->index3 = $request->get('index3');
        $userprofile->adres3 = $request->get('adres3');
        $userprofile->house3 = $request->get('house3');
        $userprofile->apartment3 = $request->get('apartment3');
        $userprofile->doctor1 = $request->get('doctor1');
        $userprofile->tel2 = $request->get('tel2');
        $userprofile->bos = $request->get('bos');
        $userprofile->boswork = $request->get('boswork');
        $userprofile->boskat = $request->get('boskat');
        $userprofile->country4 = $request->get('country4');
        $userprofile->city4 = $request->get('city4');
        $userprofile->village4 = $request->get('village4');
        $userprofile->index4 = $request->get('index4');
        $userprofile->healt1 = $request->get('healt1');
        $userprofile->adres4 = $request->get('adres4');
        $userprofile->house4 = $request->get('house4');
        $userprofile->tel3 = $request->get('tel3');
        $userprofile->doctor2 = $request->get('doctor2');
        $userprofile->save();

        \Session::flash('flash_message', 'Дякуємо! Дані успішно записані');
        if(!Empty($userprofile)){
    return redirect('user_profile_edit')->with('message-updated', __('Запис успішно відредагований...'));
}
     else {
       
	return view('user_profile',compact('details'));
	}
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserupdateRequest $request
     * @param  \App\UserProfile $modeluserprofile
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(ProfileRequest $request, UserProfile $userprofile)
    {
        $userprofile->update($request->all());

        return redirect('/admink.user_details/' . $request->id)->with('message-updated', __('Запис успішно відредагований...'));

    }  


   


 }  
