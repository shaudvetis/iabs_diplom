<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use App\AtestatProfile;
use App\Course;
use Auth;

class DetailsoneController extends Controller
{
    public function getDetails(UserProfile $details)
    {
    	return view('admink.user_details', compact('details'));    	
    }
    
    public function getDiplom (Request $request)
{
        $id_user= $request->user_id;

        $model_course = new Course;
    $details = $model_course->with([ //ЭТО ДЛЯ ОТОБРАЖЕНИЯ - С hasOne('App\AtestatProfile') ИЗ МОДЕЛИ Course С where 'user_id' = $id_user
            'atestatprofile' => function ($q) use ($id_user) {
                 $q->select('id', 'user_id', 'course_id', 'credits', 'hours', 'marks', 'nac_grade', 'ects_grade', 'total_marks', 'all_grade')->where('user_id', $id_user);
              }
         ])->select('id', 'course_title')->get();      

return view('admink.atestat_profiles')->with('details',$details)->with('id_user', $id_user);       
    }  

    public function getDetailsPrint(UserProfile $details)
    {
    	return view('admink.user_print', compact('details'));    	
    }    


}