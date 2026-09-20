<?php

namespace App\Http\Controllers\Admink;

use App\User;
use App\UserProfile;
use App\DownloadProfile;
use DB;
use App\Http\Controllers\Controller;

class TwocourseController extends Controller
{
    
    public function gettwoCourse()
    {
       $post = DownloadProfile::all()->first();
       // $form=='fulltime'?$form='очная':$form='заочная';
       //$students=User::where('course','1')->pluck('id');
       $profiles=DB::table('user_profiles')
       ->leftjoin('users','user_profiles.user_id','=','users.id')
      ->select("user_profiles.*",'users.email')
      ->where('user_profiles.course', '2')
      ->orderby('user_profiles.surname', 'asc')
      ->get();

      return view('admink.onecourse',compact('post', 'profiles'));
    }

}
    

    
       