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
    $q->select('id', 'user_id', 'course_id', 'credits', 'hours', 'marks', 'nac_grade', 'ects_grade', 'total_marks', 'all_grade','course3','course4','course5','course6')->where('user_id', $id_user);
             }
        ])->select('id', 'course_title')->get(); 
 $id_atestat = AtestatProfile::select('id')->where('user_id', $id_user)->get();
//  $w=AtestatProfile::all(); 
//$w=$id_atestat->id;          
//  foreach ($details as  $detailss) {
//   dump($detailss['atestatprofile']['id']);
// exit();
// }


return view('atestat_profile')->with('details',$details)->with('id_user', $id_user)->with('id_atestat',$id_atestat);    
    }

public function updateAtestat (Request $request, AtestatProfile $atestat) 
    {

    $data_request = $request->all(); 
    $currentUser = Auth::user();
    $id_user= $currentUser->id;

    // dump($data_request);
    // exit();
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'sub') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }
// dump($data_insert);
//     exit();
    foreach ($data_insert as $value) {
      $id = $value['id']; 
      $user_id = $id_user;
      $course_id=$value['course_id'];
      $credits=$value['credits'];
      $hours=$value['hours'];
      $marks=$value['marks'];
      $nac_grade=$value['nac_grade'];
      $ects_grade=$value['ects_grade'];
      $total_marks=$data_request['total_marks'][0];
      $all_grade=$data_request['all_grade'][0];
      $course3=$data_request['course3'][0];
      $course4=$data_request['course4'][0];
      $course5=$data_request['course5'][0];
      $course6=$data_request['course6'][0];
   AtestatProfile::update_infrom($id, $user_id, $course_id, $credits,$hours, $marks, $nac_grade, $ects_grade, $course3, $course4, $course5, $course6, $all_grade,  $total_marks);
    }


// $post = App\Post::find($id);
// $post->title = 'new title';
// $post->save();
     return redirect(route('atestat_profile'));
}
}