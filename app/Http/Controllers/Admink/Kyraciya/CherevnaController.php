<?php

namespace App\Http\Controllers\Admink\Kyraciya;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Formssurgeryday;
use DB;
use App\UserProfile;
use Carbon\Carbon;
use App\Nightworkday;

class CherevnaController extends Controller
{
  public function kyraciyacherevna ()
  {
        $direction = DB::table('napravlenias')
  ->select('napravlenias.id', 'napravlenias.direction')
               ->get(); 
               // dump($directionic);
               // exit();
 return view('admink.kyraciya.cherevna',compact('direction'));
  }

public function kyraciyapost(Request $request)
{
 $direction = DB::table('napravlenias')
  ->select('napravlenias.id', 'napravlenias.direction')
  ->get(); 

$i=$request->all();
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
$d = $request->direction;
$calendars = $request->calendars;
$calendarpo = $request->calendarpo;
// dump($request);
// exit();

//Определяет всех интернов по направлению по курации больных в операциях   
$inputformsday = DB::table('inputformsdays')
            ->join('user_profiles', 'id_student', '=', 'user_profiles.user_id')
            ->select('inputformsdays.*', 'user_profiles.user_id','user_profiles.surname', 'user_profiles.name','user_profiles.decatki','user_profiles.course')
            ->where('direction', $d)
            ->where('course', $a)
            ->where('decatki', $b)
             ->whereBetween('inputformsdays.created_at', [$calendars, $calendarpo])
            ->orderBy('inputformsdays.created_at','desc')
            ->orderBy('user_profiles.surname')
            ->get();
//  dump($inputformsday);
// exit();
      
  $result2 = array();
 foreach ($inputformsday as $l) {
 $result2[$l->user_id]['user_id'] = $l->user_id;
 $result2[$l->user_id]['surname'] = $l->surname;
 $result2[$l->user_id]['name'] = $l->name;
 $result2[$l->user_id]['fio'][] = $l->fio;
 $result2[$l->user_id]['diagnoses'][] = $l->diagnoses;
 $result2[$l->user_id]['num_card'][] = $l->num_card;
 $result2[$l->user_id]['apdate_end'][] = $l->apdate_end;
 $result2[$l->user_id]['comm'][] = $l->comm;
 $result2[$l->user_id]['apdate'][] = $l->apdate;
  $result2[$l->user_id]['oper'][] = $l->oper;
 $result2[$l->user_id]['type_work'][] = $l->type_work;
 $result2[$l->user_id]['created_at'][] = $l->created_at;
}           
//  dump($result2);
// exit();
//Определяет всех интернов по направлению литература  
$literatyre = DB::table('literatyres')
            ->join('user_profiles', 'literatyres.user_id', '=', 'user_profiles.user_id')
            ->select('literatyres.*', 'user_profiles.user_id','user_profiles.surname', 'user_profiles.name','user_profiles.decatki','user_profiles.course')
            ->where('direction', $d)
            ->where('course', $a)
            ->where('decatki', $b)
            ->whereBetween('literatyres.created_at', [$calendars, $calendarpo])
            ->orderBy('literatyres.created_at')
            ->get();
 $result3 = array();
 foreach ($literatyre as $l) {
 $result3[$l->user_id]['user_id'] = $l->user_id;
 $result3[$l->user_id]['course'] = $l->course;
 $result3[$l->user_id]['decatki'] = $l->decatki;
 $result3[$l->user_id]['surname'] = $l->surname;
 $result3[$l->user_id]['name'] = $l->name;
 $result3[$l->user_id]['literatyre'][] = $l->literatyre;
}     
//Определяет всех интернов по направлению засвоені навички 
$formspracticeday = DB::table('formspracticedays')
            ->join('user_profiles', 'id_student', '=', 'user_profiles.user_id')
            ->select('formspracticedays.*', 'user_profiles.user_id','user_profiles.surname', 'user_profiles.name','user_profiles.decatki','user_profiles.course')
            ->where('direction', $d)
            ->where('course', $a)
            ->where('decatki', $b)
            ->whereBetween('formspracticedays.created_at', [$calendars, $calendarpo])
            ->orderBy('formspracticedays.created_at')
            ->get();    

 $result4 = array();
 foreach ($formspracticeday as $l) {
 $result4[$l->user_id]['user_id'] = $l->user_id;
 $result4[$l->user_id]['surname'] = $l->surname;
 $result4[$l->user_id]['name'] = $l->name;
 $result4[$l->user_id]['get_skills'][] = $l->get_skills;
 $result4[$l->user_id]['pract_cherevna'][] = $l->pract_cherevna;
 $result4[$l->user_id]['pract_grudna'][] = $l->pract_grudna;
 $result4[$l->user_id]['pract_proct'][] = $l->pract_proct;
 $result4[$l->user_id]['pract_urolog'][] = $l->pract_urolog;
 $result4[$l->user_id]['pract_vascular'][] = $l->pract_vascular;
 $result4[$l->user_id]['pract_gnoynaya'][] = $l->pract_gnoynaya;
 $result4[$l->user_id]['pract_kardio'][] = $l->pract_kardio;
 $result4[$l->user_id]['pract_opiku'][] = $l->pract_opiku;
 $result4[$l->user_id]['created_at'][] = $l->created_at;
 $result4[$l->user_id]['sum_number'][] = $l->sum_number;
 }   
// dump($result4);
// exit();

$opers= DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name,m1.fio, m1.oper,m1.diagnoses,m1.oper,m1.samost,m1.asistent,m1.etap  from user_profiles


  left join (select id_student,COUNT(fio)as fio,COUNT(diagnoses)as diagnoses, SUM(case when oper!='  ' then 1 else 0 end)as oper, SUM(case when type_work='Самостійно' then 1 else 0 end) as samost, SUM(case when type_work='Асистенція' then 1 else 0 end) as asistent,SUM(case when type_work='Етапи операції' then 1 else 0 end) as etap from inputformsdays where direction='$d' group by id_student) as m1
  on user_profiles.user_id=m1.id_student

where user_profiles.course='$a' and user_profiles.decatki='$b' ");

// dump($opers);
// exit();

return view('admink.kyraciya.cherevna',compact('a','b','c','d','direction','result2','result3','result4','opers'));
}



public function kyracianight()
  {

 return view('admink.kyraciya.nightpracticeday');
}

public function nightsurgerypost(Request $request)
{

$direction = DB::table('napravlenias')
  ->select('napravlenias.id', 'napravlenias.direction')
  ->get(); 

$i=$request->all();
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
$d = $request->direction;
$calendars = $request->calendars;
$calendarpo = $request->calendarpo;

// dump($request);
// exit();
//Нічні чергування у відділенні оглянуті хворі
//Нічні чергування у приймальному відділенні
$nightworkday = DB::table('nightworkdays')
            ->join('user_profiles', 'nightworkdays.id_student', '=', 'user_profiles.user_id')
            ->select('nightworkdays.date_work', 'nightworkdays.baza',
'nightworkdays.time_work','nightworkdays.station_work','nightworkdays.fiostacionar','nightworkdays.num_cardstacionar','nightworkdays.diagnosesstac','nightworkdays.oper','nightworkdays.type_workstac',
              'user_profiles.user_id','user_profiles.surname', 'user_profiles.name','user_profiles.decatki','user_profiles.course')
              ->where('course', $a)
              ->where('decatki', $b)
              ->where('station_work', 1)
              ->whereBetween('nightworkdays.created_at', [$calendars, $calendarpo])
           ->orderBy('user_profiles.surname')
           ->get();

 $result5 = array();
 foreach ($nightworkday as $l) {
 $result5[$l->user_id]['user_id'] = $l->user_id;
 $result5[$l->user_id]['surname'] = $l->surname;
 $result5[$l->user_id]['name'] = $l->name;
 $result5[$l->user_id]['date_work'][] = $l->date_work;
 $result5[$l->user_id]['baza'][] = $l->baza;
 $result5[$l->user_id]['time_work'] = $l->time_work;
 $result5[$l->user_id]['station_work'][] = $l->station_work;
 $result5[$l->user_id]['fiostacionar'][] = $l->fiostacionar;
 $result5[$l->user_id]['num_cardstacionar'][] = $l->num_cardstacionar;
 $result5[$l->user_id]['diagnosesstac'][] = $l->diagnosesstac;
 $result5[$l->user_id]['oper'][] = $l->oper;
 $result5[$l->user_id]['type_workstac'][] = $l->type_workstac;
 } 

  $nighpriem = DB::table('nightworkdays')
            ->join('user_profiles', 'nightworkdays.id_student', '=', 'user_profiles.user_id')
            ->select('nightworkdays.date_work', 'nightworkdays.baza','nightworkdays.time_work','nightworkdays.station_work','nightworkdays.fio','nightworkdays.diagnosespriom','nightworkdays.otkaz','nightworkdays.num_cardotkaz','nightworkdays.prichina','nightworkdays.manipulaciiotkaz','nightworkdays.type_workotkaz','nightworkdays.gosp','nightworkdays.num_card','nightworkdays.work','nightworkdays.type_workgosp','user_profiles.user_id','user_profiles.surname', 'user_profiles.name','user_profiles.decatki','user_profiles.course')
              ->where('course', $a)
              ->where('decatki', $b)
              ->where('station_work',2)
              ->whereBetween('nightworkdays.created_at', [$calendars, $calendarpo])
           ->orderBy('user_profiles.surname')
            ->get();
//   dump($nighpriem);
// exit();
 $result6 = array();
 foreach ($nighpriem as $l) {
 $result6[$l->user_id]['user_id'] = $l->user_id;
 $result6[$l->user_id]['surname'] = $l->surname;
 $result6[$l->user_id]['name'] = $l->name;
 $result6[$l->user_id]['date_work'][] = $l->date_work;
 $result6[$l->user_id]['baza'][] = $l->baza;
 $result6[$l->user_id]['time_work'] = $l->time_work;
 $result6[$l->user_id]['station_work'][] = $l->station_work;
 $result6[$l->user_id]['fio'][] = $l->fio;
 $result6[$l->user_id]['diagnosespriom'][] = $l->diagnosespriom;
 $result6[$l->user_id]['otkaz'] = $l->otkaz;
 $result6[$l->user_id]['num_cardotkaz'][] = $l->num_cardotkaz;
 $result6[$l->user_id]['prichina'][] = $l->prichina;
 $result6[$l->user_id]['manipulaciiotkaz'][] = $l->manipulaciiotkaz;
 $result6[$l->user_id]['type_workotkaz'][] = $l->type_workotkaz;
 $result6[$l->user_id]['gosp'][] = $l->gosp;
 $result6[$l->user_id]['num_card'][] = $l->num_card;
 $result6[$l->user_id]['work'][] = $l->work;
 $result6[$l->user_id]['type_workgosp'][] = $l->type_workgosp;
} 

 

//   dump($result6);
// exit();
    
return view('admink.kyraciya.nightpracticeday',compact('result5','result6','a','b','c'));
}
}