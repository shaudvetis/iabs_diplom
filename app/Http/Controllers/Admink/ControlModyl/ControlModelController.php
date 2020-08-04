<?php

namespace App\Http\Controllers\Admink\ControlModyl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use App\UserProfile;
use App\OcenkiTables;
use App\Intern\SeminarTema;
use Carbon\Carbon;


class ControlModelController extends Controller
{
 public function modylballstart(Request $request){

$i=$request->all();
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;

//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,  mocenki.suma, mocenki1.suma1  FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=1 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=1 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname ");

 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '1')
            ->get(); 
// dump($results1);
// exit();
return view ('admink.controlmodyl.control_modyl', compact('results1','direction', 'a','b'));

}

public function modylcherevna(Request $request){

$i=$request->all();
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
//Получает список студентов с оценками для 3 курсов
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1,mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=2 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=2 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=2 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname
 ");
$direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '2')
            ->get();
// dump($results1);
// exit();

 return view ('admink.controlmodyl.model_cherevna', compact('results1','direction','a','b'));

}

public function modylproctologia(Request $request){
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
//Получает список студентов с оценками для всех курсов
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1, mocenki2.suma3  FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=4 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=4 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select    testirovanies.user_id, testirovanies.all_bal as suma3 from testirovanies where testirovanies.direction=4 ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname");

$direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '4')
            ->get();

 return view ('admink.controlmodyl.model_proctologia', compact('results1','a','b','direction'));

}

public function modylgnoynaya(Request $request){

$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1, mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=7 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=7 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=7 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname ");
$direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '7')
            ->get();

return view ('admink.controlmodyl.model_gnoynaya', compact('results1','a','b','direction'));

}
public function modylurologiya(Request $request){
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1, mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=5 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=5 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select  testirovanies.user_id, testirovanies.all_bal as suma3 from testirovanies where testirovanies.direction=5 ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname");

 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '5')
            ->get(); 

 return view ('admink.controlmodyl.model_urologiya', compact('results1','a','b','direction'));

}
public function modylvascular(Request $request){

$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
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
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=6 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=6 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=6 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

 where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname");

 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '6')
            ->get(); 
 return view ('admink.controlmodyl.model_vascular', compact('results1','a','b','direction'));
}
public function modylgrudna(Request $request){
	$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;

//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1, mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=3 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=3 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=3 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname");
 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '3')
            ->get(); 

 return view ('admink.controlmodyl.model_grudna', compact('results1','a','b','direction'));
}
public function modylkardio(Request $request){
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1, mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=8 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=8 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=8 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id

where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname");

 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '8')
            ->get(); 

 return view ('admink.controlmodyl.model_kardio', compact('results1','a','b','direction'));
}

public function modylopiku(Request $request){
$i=$request->all();
$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
//Получает список студентов с оценками для 1 десятка
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,user_profiles.course,   mocenki.suma, mocenki1.suma1, mocenki2.suma3 FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus=9 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus=9 group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=9 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id

where  
 user_profiles.course ='$a' and user_profiles.decatki ='$b'order By user_profiles.surname");

 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', '9')
            ->get(); 
// dump($direction);
// exit();
 return view ('admink.controlmodyl.model_opiku', compact('results1','direction','a','b'));
}
}