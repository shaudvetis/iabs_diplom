<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserProfile;
use Auth;
use DB;
use Carbon\Carbon;
use App\User;


class ViewRozkladController extends Controller
{

	 public function getrozklad()
 {  
    $current = Auth::user();

   $syear = DB::table('user_profiles')
   ->select('startyear','decatki')
   ->where('user_id',$current->id)
   ->get();
//    dump($syear[0]->startyear);
// exit();
   if (!isset($syear[0])) {
    $text = 'Не заповнені Особісті данні! Перегляд розкладу заблокован!Обов`язково заповніть сторінку з особистими даними!';
     return view ('view_rozklad',compact('text'));
   } 
  
$year_start=$syear[0]->startyear;
     
$decatki = $syear[0]->decatki;

$rozklad = DB::table('rozklad_moduls')
->leftjoin('modul_hour', 'rozklad_moduls.id_napravlenie', '=', 'modul_hour.id' )
->select('rozklad_moduls.*','modul_hour.modul','modul_hour.days')
->where('rozklad_moduls.year_start',$year_start)
->get();


$ns = DB::select("
   select decatki, name_napravlenie, modul_hour.id as ids, nameshort, dates, datep,year(dates) as year, month(dates) as month, day(dates) as day,  year_start, rozklad_moduls.npp  from rozklad_moduls, teacher_names, modul_hour
where teacher_names.id=rozklad_moduls.id_teacher and
modul_hour.id=rozklad_moduls.id_napravlenie  and rozklad_moduls.year_start='$year_start'  and rozklad_moduls.decatki='$decatki'
  order by decatki,year,dates asc
   ");
 $datesreqwest = [];
 foreach($ns as $key1 => $n3){
$datesreqwest[$n3->year][$n3->month][$n3->decatki][$n3->day]= $n3->name_napravlenie.'<br>'.$n3->nameshort;
}

//    dump($ns);
// exit();
 return view ('view_rozklad',compact('datesreqwest'));
}


 }  

