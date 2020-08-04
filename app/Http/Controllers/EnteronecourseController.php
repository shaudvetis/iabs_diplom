<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use DB;


class EnteronecourseController extends Controller
{
    public function indexenter(Request $request)
    {  
    $intern=Auth::user();
    $user_id=$intern->id;
    $input_control=DB::select("select input_controls.user_id, input_controls.bal1,input2.course3,input2.course4,input2.course5,input2.course6, input1.surname, input1.name from input_controls
      
        join (select user_profiles.user_id, user_profiles.surname, user_profiles.name from user_profiles) as input1
         ON input_controls.user_id=input1.user_id 

         left join (select DISTINCT(atestat_profiles.user_id), atestat_profiles.course3, atestat_profiles.course4, atestat_profiles.course5,atestat_profiles.course6  from atestat_profiles group by atestat_profiles.user_id, atestat_profiles.course3, atestat_profiles.course4, atestat_profiles.course5,atestat_profiles.course6)as input2
             ON input_controls.user_id=input2.user_id 

           where input_controls.user_id='$user_id'");	
         // dump($input_control);
         // exit();
        return view('enteronecourse',compact('input_control'));
    }

   
}
