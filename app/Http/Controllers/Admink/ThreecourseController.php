<?php

namespace App\Http\Controllers\Admink;

use App\User;
use App\UserProfile;
use App\DownloadProfile;
use App\Http\Controllers\Controller;

class ThreecourseController extends Controller
{
    
    public function threeCourse()
    {
       $post = DownloadProfile::all()->first();
       // $form=='fulltime'?$form='очная':$form='заочная';
       //$students=User::where('course','1')->pluck('id');
       $profiles=UserProfile::where('course','3')->orderby('surname', 'asc')->get();
      return view('admink.onecourse',compact('post', 'profiles'));
    }

}
    

    
       