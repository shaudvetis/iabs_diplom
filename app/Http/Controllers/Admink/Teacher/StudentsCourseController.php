<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\ModelIntern\StudentsCourse;
use DB;
use Validator;
use Carbon\Carbon;

class StudentsCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $c = $request->course;
   $profiles=DB::table('students_courses')
   ->join('user_profiles', 'students_courses.user_id', '=', 'user_profiles.user_id' )
   ->select('students_courses.id','students_courses.user_id', 'students_courses.course', 'students_courses.decatki','students_courses.comments', 'user_profiles.surname',  'user_profiles.name')
   ->where('students_courses.course', $c)
   ->where('students_courses.years', '!=', Carbon::now()->format('Y'))
   ->orderBy('user_profiles.surname', 'asc')
   ->get();
// dump($profiles);
// exit();
        return view ('admink.kerivnuk.students_course', compact('profiles','c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// dump($request);
// exit();
      
    
   $data_request=$request->all();

   $data_insert = array();

if ($request->last==1){
   
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'last') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }  

//  dump($data_insert);
// exit();
         
foreach ($data_insert as  $value3) {
  if(!empty($value3['id_intern1'])) {
        $user = $value3['id_intern1'];
        $course = $value3['course'];
     $go = StudentsCourse::select('created_at','user_id','years')->where('user_id',$user)->orderBy('id','desc')->first();
// if ($go->created_at != Carbon::now()->format('Y')) 
 if ($go->created_at->addYears(1)->format('Y') == Carbon::now()->format('Y'))
{
    DB::table("students_courses")
     ->insert(["user_id" => $user,
     'course'=> $course,
     'years'=>Carbon::now()->format('Y'),
     'created_at'=>Carbon::now(),
     'comments' =>'1'
 ]);
     DB::table('user_profiles')
    ->where('user_id','=', $user)
    ->update(['course'=> $course]);
}
  else {
     return back()->with('message-updated', __('По інтерну  вже був зроблен перехід, для вирішиння питань - зверніться к адміну сайта'));
}
    }
    else {
     continue;

}

// DB::table('user_profiless')
//     ->where('id', $id)
    
//     ->increment('course', 1, ['id' => $id]);
}
}

$data_insert_del = array(); 
$aDoor =$request->id_intern1;

// dump($data_request);
// exit(); 

if ($request->del==2 )

 //   dump($data_request);
 // exit(); 
    foreach($data_request as $key1 => $value1) {
     if($key1 != '_token' && $key1 != 'del') 
       foreach($value1 as $key2 => $value2) { 
         $data_insert_del[$key2][$key1] = $value2;
       }     
    }  

       // dump($data_insert_del);
       //  exit();
foreach ($data_insert_del as  $value3) {
        //  dump($value3);
        // exit();  
   

if (!empty($value3['id_intern1'])) {
     $user = $value3['id_intern1'];
    $comments = $value3['comments'];

$go = StudentsCourse::select('created_at','user_id','years')->where('user_id',$user)->orderBy('id','desc')->first();
// if ($go->created_at != Carbon::now()->format('Y')) 
 if ($go->created_at->addYears(1)->format('Y') == Carbon::now()->format('Y'))
{   
    DB::table("students_courses")
     ->insert(["user_id" => $user,
     'course'=> 9,
     'years'=>Carbon::now()->format('Y'),
     'created_at'=>Carbon::now(),
     'comments' =>$comments
 ]);
      DB::table('user_profiles')
    ->where('user_id','=', $user)
    ->update(['course'=> 9]);
}

 else {
    return back()->with('message-updated', __('Запис не відредагований.В цьому році по інтерну вже є запис...'));
 }
}
  else {
     continue;
}
}


// dump($data_insert_del);
// exit(); 

// DB::table('user_profiless')
//     ->where('id', $id)
    
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
