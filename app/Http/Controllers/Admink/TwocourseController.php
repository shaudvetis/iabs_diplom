<?php

namespace App\Http\Controllers\Admink;

use App\User;
use App\UserProfile;
use App\DownloadProfile;
use App\Http\Controllers\Controller;

class TwocourseController extends Controller
{
    
    public function gettwoCourse()
    {
       $post = DownloadProfile::all()->first();
       // $form=='fulltime'?$form='очная':$form='заочная';
       //$students=User::where('course','1')->pluck('id');
       $profiles=UserProfile::where('course','2')->orderby('surname', 'asc')->get();
      return view('admink.onecourse',compact('post', 'profiles'));
    }

}
    

    
       