<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
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
   


    $profile=DB::table('user_profiles')
   ->select('user_profiles.id','user_profiles.user_id', 'user_profiles.course', 'user_profiles.decatki','user_profiles.surname',  'user_profiles.name', 'user_profiles.comments');
   if($c == 100){

    $profile->where('user_profiles.course', '<=', 3);

}else{
    $profile->where('user_profiles.course', $c);
}
   
   $profile->where('user_profiles.course', '!=', '9')->where('user_profiles.course', '!=', 0)
   ->orderBy('user_profiles.surname', 'asc');

   $profiles = $profile->get();
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

    
   $data_request=$request->all();

   $data_insert = array();

   if ($request->last == 1){
   
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'last') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }  

//  dump($data_insert);
// exit();
         
foreach ($data_insert as  $value3) {
 
 $user = $value3['user_id'];
 
 $course = $value3['course'] + 1;
 
 $go = UserProfile::where('user_id', $user)->update(['course' => $course]);

}
}

 return back()->with('message-updated', __('Дякуємо! Дані успішно записані'));

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
