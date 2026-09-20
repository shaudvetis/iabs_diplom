<?php

namespace App\Http\Controllers\Admink\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateTime;
use DateInterval;
use App\helpers;


class AjaxrozController extends Controller
{ 
  

public function calendarget(Request $request) {


//     dump($request);
// exit();
  if(!empty($_GET['month'])){
  $f=date($_GET['month'].'-01');
//     dump($f);
// exit();
}
 if(isset($_GET['decatki']))
  $decatki=$_GET['decatki'];

 if(!empty($_GET['yestr']) ){
  $f=$_GET['yestr'];
}
if(!empty($_GET['next']) ){
  $f=$_GET['next'];
}

$rr=date('Y-m-d', strtotime('monday this week', strtotime($f)));
//   dump($rr);
// exit();
//Проверяем если пусто в реквест то присваеваем дату єтого понедельника
 if (empty($f)){
    $calendars = $rr;
    $ty=\Carbon\Carbon::parse($f)->addMonth()->format('Y-m-d');
//       dump($ty);
// exit();
    $qs=DB::table('calendars')
         ->select('calendars.ndayweek')
         ->where('curdate','=',$ty)->get();
     $shift = $f; 
     $shift1 = \Carbon\Carbon::parse($f)->addMonth()->format('Y-m-d');

    if ($ty!==7)
 $calendarpo = date('Y-m-d', strtotime('last sunday this week', strtotime($ty)));
  }else {
$forj=$f;
$shift = $f;
$shift1 = \Carbon\Carbon::parse($f)->addMonth()->format('Y-m-d');

$qw=DB::table('calendars')
         ->select('calendars.ndayweek')
         ->where('curdate','=',$forj)->get();
    if ($qw!==1)
$calendars=date('Y-m-d', strtotime('monday this week', strtotime($forj)));
$cal=\Carbon\Carbon::parse($forj)->addMonth()->format('Y-m-d');
$lk=DB::table('calendars')
         ->select('calendars.ndayweek')
         ->where('curdate','=',$cal)->get();
    if ($lk!==7)
$calendarpo=date('Y-m-d', strtotime('sunday this week', strtotime($cal)));
}

$calendar = DB::table('calendars')
        ->select('calendars.*')
        ->whereBetween('curdate',[$calendars, $calendarpo])
        ->get();
if (empty($request->calendars)){
$two=\Carbon\Carbon::parse($f)->addMonth()->format('Y-m-01');
//Преобразует текстовое представление даты на английском языке в метку времени Unix
$gr=date('Y-m-d', strtotime('monday this week', strtotime($two)));
$po=\Carbon\Carbon::parse($two)->addMonth()->format('Y-m-d');
$po1=date('Y-m-d', strtotime('sunday this week', strtotime($po))); 

}
else{
$g=\Carbon\Carbon::parse($request->calendars)->addMonth()->format('Y-m-01');
$gr=date('Y-m-d', strtotime('monday this week', strtotime($g)));
$e=\Carbon\Carbon::parse($calendars)->addMonth()->format('Y-m-d');
$po=\Carbon\Carbon::parse($g)->addMonth()->format('Y-m-d');
$po1=date('Y-m-d', strtotime('sunday this week', strtotime($po))); 
}
// dump($twor);
// exit();


// dump($shift);
// exit();
$calendarp = DB::table('calendars')
        ->select('calendars.*')
        ->whereBetween('curdate',[$gr, $po1])
        ->get();

    return view('admink.kerivnuk.ajaxcalendar',compact('f','calendar','shift','calendarp','shift1'));
}

   
}

