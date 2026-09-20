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
   
    $details = UserProfile::all()->where('user_id', Auth::user()->id)->first();

    // $sd=$details->gender;
    // //dd($sd);
    // if($sd === "Чоловіча"){
    //     $gender = 'true';
    // }
    // elseif($sd === "Жіноча"){
    //   // echo 'dfdfdf';
    //     $gender = 'false';
    // }
    // //$gender = 'false';

    return view ('user_profile_edit', compact('details'));

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

