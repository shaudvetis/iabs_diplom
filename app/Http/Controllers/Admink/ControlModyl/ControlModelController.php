<?php

namespace App\Http\Controllers\Admink\ControlModyl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use App\UserProfile;
use App\OcenkiTables;
use App\Zvitthteecourses;
use App\Intern\SeminarTema;
use App\Allsemball;
use Carbon\Carbon;


class ControlModelController extends Controller
{
  
 public function modylballstart(Request $request,$id){

$i=$request->all();
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;

if ($request->ordinator==1) {
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1,mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus='$id' group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus='$id' group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction='$id' group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course ='$request->courses' and user_profiles.clordinator ='$request->ordinator' order By user_profiles.surname ");
} else {
//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1,mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus='$id' group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus='$id' group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction='$id' group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course = '$a' and user_profiles.decatki = '$b'  order By user_profiles.surname ");
}
 
 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction as name','settings_bal.*' )
            ->where('napravlenias.id', $id)
            ->get(); 
// dump($results1);
// exit();
$search = Allsemball::where('direction', $id)->where('courses', $a)->where('decatki', $b)->delete();
 
 foreach($results1 as $user_inf){

  $y = $user_inf->suma1+$user_inf->suma+$user_inf->suma3;

  $etcs = '';

  $ballfinish = '';

  foreach($direction as $user_inf1) {

  $x=ceil($y*100/$user_inf1->max); 
   if (($x<=$user_inf1->all_control5)&&($x>=$user_inf1->all_control6))
 {
 
 $etcs = ceil($x).'%'.' '.'A';
 
 }elseif (($x<=$user_inf1->all_control8)&&($x>=$user_inf1->all_control9)) {
 
 $etcs = ceil($x).'%'.' '.'B';
 
 }elseif (($x<=$user_inf1->all_control11)&& ($x>=$user_inf1->all_control12)) {
  
  $etcs = ceil($x).'%'.' '.'C';
 }
 
 elseif (($x<=$user_inf1->all_control14)&& ($x>=$user_inf1->all_control15)) {

  $etcs = ceil($x).'%'.' '.'D';
 }
 
  elseif (($x<=$user_inf1->all_control17)&& ($x>=$user_inf1->all_control18)) {
  
  $etcs = ceil($x).'%'.' '.'E';
 }

elseif ($x<=$user_inf1->all_control20) {
   $etcs = ceil($x).'%'.' '.'FX';
 }

else{
$etcs = 0;
}

 $x=ceil($y*100/$user_inf1->max);


if (($x <= $user_inf1->all_control5) && ($x >= $user_inf1->all_control6))

$ballfinish = 5;

elseif (($x<=$user_inf1->all_control8)&&($x>=$user_inf1->all_control9)) 
 
 $ballfinish = 4;
 
elseif (($x<=$user_inf1->all_control11)&& ($x>=$user_inf1->all_control12)) 
 
 $ballfinish = 4;

elseif (($x<=$user_inf1->all_control14)&& ($x>=$user_inf1->all_control15)) 
   
  $ballfinish = 3;

 elseif (($x<=$user_inf1->all_control17)&& ($x>=$user_inf1->all_control18)) 
 
 $ballfinish = 3;

elseif ($x<=$user_inf1->all_control20) 
 
 $ballfinish = 2;

else {
  $ballfinish = 0;
}


if ($user_inf->suma <= 7) { 
  $ballfinish = 0; 
}

}

  $saveball = Allsemball::create([
     'user_id' => $user_inf->user_id,
     'direction' => $id,
     'comment' => $user_inf->surname.' '.$user_inf->name,
     'allseminar' => $user_inf->suma1,
     'kyracia' => $user_inf->suma,
     'test' => $user_inf->suma3,
     'allball' => $y,
     'ects' =>  $etcs,
     'ballfinish' => $ballfinish,
     'courses' => $a,
     'decatki' => $b,
  ]);

 }


return view ('admink.controlmodyl.control_modyl', compact('results1','direction', 'a','b','id'));

}

 public function postmodylball (Request $request) {
  

    $data_request = $request->all(); 
    // dump($data_request);
    // exit();
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'direction_id') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }
    foreach ($data_insert as $value) {
    	if(!isset($value['ball'])) {
    		$value['ball'] = 1;
    	}
     $flight =Zvitthteecourses::updateOrCreate(
    ['user_id' => $value['user_id'], 'direction_id' => $request->direction_id], 


    ['ball' => $value['ball'], 'form' => 1, 'course' => 3, 'comm' => 0, 'updated_at' => Carbon::now(), 'created_at' =>  Carbon::now()]
);
    }
  // dd($request);
  // zvitthteecourses
    return back();
}

}