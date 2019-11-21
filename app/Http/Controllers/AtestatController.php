<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AtestatProfile;
use Auth;
use DB;
use App\User;
//use App\SpDiplom;
use App\Course;

class AtestatController extends Controller
{ 
  

    //public function getAtestat(SpDiplom $request)
    public function getAtestat(Course $model_course)
    {
        
        $currentUser = Auth::user();
        $id_user= $currentUser->id;

     

 //$details = $model_course->select('id','course_title')->get(); //ЭТО ДО ОТОБРАЖЕНИЯ
 $details = $model_course->with([ //ЭТО ДЛЯ ОТОБРАЖЕНИЯ - С hasOne('App\AtestatProfile') ИЗ МОДЕЛИ Course С where 'user_id' = $id_user
            'atestatprofile' => function ($q) use ($id_user) {
                $q->select('id', 'user_id', 'course_id', 'credits', 'hours', 'marks', 'nac_grade', 'ects_grade', 'total_marks', 'all_grade')->where('user_id', $id_user);
             }
        ])->select('id', 'course_title')->get();      

return view('atestat_profile')->with('details',$details)->with('id_user', $id_user);    
    }

public function updateAtestat (Request $request, AtestatProfile $atestat) 
    {

    //print_r($request->all()); die;
    
    $data_request = $request->all(); 
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'sub') {
          foreach($value1 as $key2 => $value2) { 
             $data_insert[$key2]['total_marks'] = $data_request['total_marks'][0];      
             $data_insert[$key2][$key1] = $value2;
if($key2 != 0) {
 $data_insert[$key2]['total_marks'] = $data_request['total_marks'][0];  
  $data_insert[$key2]['all_grade'] = $data_request['all_grade'][0];     
          }          
       }     
    }
             
   }              
      

    // //$atestat = new AtestatProfile;
   $atestat_remove = $atestat->where('user_id', $data_request['user_id']);
    $atestat_remove->delete();
    // //print_r($data_insert); die;
     $atestat->insert($data_insert);
// dump($data_insert);
     return redirect(route('atestat_profile'));

 
}
}