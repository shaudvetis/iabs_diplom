<?php

namespace App\Http\Controllers\Admink;

use App\User;
use App\UserProfile;
use App\DownloadProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OnecourseController extends Controller
{
    /**
     * @param $course
     * @param $form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCourse()
    {
       $post = DownloadProfile::all()->first();
       // $form=='fulltime'?$form='очная':$form='заочная';
       //$students=User::where('course','1')->pluck('id');
       $profiles=UserProfile::where('course','1')->orderby('surname', 'asc')->get();
    	return view('admink.onecourse',compact('post', 'profiles'));
    }
 public function postCourse(Request $request)
    {
 
       if (!empty($request->id_intern1)) {
      $data_request=$request->all();
       
    $currentUser = $request->user_id;
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'sub') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }
    foreach ($data_insert as  $value3) {
    $id = $value3['id_intern1'];}

    
DB::table('user_profiles')
    ->where('user_id', $id)
    ->increment('course', 1, ['user_id' => $id]);

    // dump($data_insert);
    //    exit();
}
else {
   // dump($request);
   //     exit();
}
      
      return back();
    }
}
    

    
       