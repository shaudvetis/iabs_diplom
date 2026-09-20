<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelTeacher\InputControl;
use DB;


class Input_contController extends Controller
{
	public function getinput() {

//dump($input_control->user_id);
	// exit();
	$input_control=DB::select('select DISTINCT(user_profiles.user_id), user_profiles.surname, user_profiles.name, input1.bal1,input1.sr_ball_made, input2.course3,input2.course4,input2.course5, input2.course6, input3.sr_ball, input4.count_ball from user_profiles 
left join (select input_controls.user_id, input_controls.bal1,input_controls.sr_ball_made  from input_controls)as input1
 ON user_profiles.user_id=input1.user_id 

 left join (select DISTINCT(atestat_profiles.user_id), atestat_profiles.course3, atestat_profiles.course4, atestat_profiles.course5,atestat_profiles.course6  from atestat_profiles group by atestat_profiles.user_id, atestat_profiles.course3, atestat_profiles.course4, atestat_profiles.course5,atestat_profiles.course6 )as input2
 ON user_profiles.user_id=input2.user_id 

left join (select atestat_profiles.user_id, sum(nac_grade)as sr_ball
        from atestat_profiles where nac_grade !=9 group by user_id)as input3
 ON user_profiles.user_id=input3.user_id 

left join (select atestat_profiles.user_id, count(nac_grade)as count_ball
        from atestat_profiles where nac_grade !=9 group by user_id )as input4
 ON user_profiles.user_id=input4.user_id 

 where user_profiles.course=1  order by user_profiles.surname ');	
	// dump($input_control);
	// exit();
	 return view('admink.kerivnuk.input_control',compact('input_control'));
	}

	public function postinput(Request $request) {
		// dump($request);
		// exit();
	$data_request=$request->all();

 
 // dump($data_request);
 // exit();
	 $data_insert = array();
	foreach ($data_request as $key1 => $value1) {
	 if($key1 != '_token' && $key1 != 'sub')
		
		foreach($value1 as $key2 => $value2) { 


            $data_insert[$key2][$key1] = $value2;
 

		}
	}

	// dump($data_insert);
	// exit();
$data_user = collect();
$bal1 = collect();
	foreach ($data_insert as $key => $value3) {

// dd($sr);
// exit();
		$data_user = $value3['user_id'];
		 
		$bal1=$value3['bal1'];
		$bal1=$value3['sr_ball'];

		$zapros = InputControl::where('user_id','=',$data_user)->first();

if (is_null($zapros))
     {
       $zapros=InputControl::updateOrCreate(['user_id'=>$data_user, 'bal1'=>$value3['bal1'], 'sr_ball_made'=>$value3['sr_ball']]);
   }
	else{	$zapros=InputControl::where('user_id','=',$data_user)->update(['user_id'=>$data_user, 'bal1'=>$value3['bal1'],'sr_ball_made'=>$value3['sr_ball']]);
		}


	}

  return back();
	}

 }  

