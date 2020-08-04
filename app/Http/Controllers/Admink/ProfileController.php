<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{


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
