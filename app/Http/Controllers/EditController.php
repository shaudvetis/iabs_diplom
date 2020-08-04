<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use Auth;
use App\User;
use App\Http\Requests\ProfileRequest;

class EditController extends Controller
{

	 public function indexEdit()
{
    $name_us = Auth::user()->name;
    $auth = User::all()->where('name', $name_us)->first();
    $id_user = $auth->id;
    $details = UserProfile::all()->where('user_id', $id_user)->first();
	//dd($details->gender);
    $sd=$details->gender;
    //dd($sd);
    if($sd === "Чоловіча"){
        $gender = 'true';
    }
    elseif($sd === "Жіноча"){
      // echo 'dfdfdf';
        $gender = 'false';
    }
    //$gender = 'false';
//       $check = 'true';  //Эта переменная из students  чтоб запустился base
     if($details === NULL) {
    $check = 'true';  
        }
        else{
         $check  = 'false';
        }
    return view ('user_profile_edit', compact('details','gender','check'));

	}
/**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserupdateRequest $request
     * @param  \App\UserProfile $modeluserprofile
     * @return \Illuminate\Http\Response
     */
    public function updateEdit(ProfileRequest $request, UserProfile $userprofile)
    {
     $id = $request->input('id');
     $userprofile = UserProfile::find($id);    
     $userprofile->fill($request->input())->save();
     return redirect('/user_profile_edit/')->with('message-updated', __('Запис успішно відредагований...'));
    }   

 }  

