<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Zvitthteecourses;
use App\ModelIntern\Napravlenia;
use App\ModelTeacher\PlanRozklad;
use App\Allsemball;
use DB;
use Auth;
use Carbon\Carbon;

class TeacherController extends Controller
{
	public function Teacherindex() {
	 
	 return view('admink.teacher.teacher');
	}

public  function zvitthreecourse () {

$user = Zvitthteecourses::select('zvitthteecourses.user_id', 'direction_id', 'ball', 'user_profiles.surname', 'user_profiles.name', 'user_profiles.lastname')
->leftjoin('user_profiles', 'user_profiles.user_id','=', 'zvitthteecourses.user_id')
->orderby('surname', 'asc')
->orderby('direction_id', 'asc')
->toBase()->get();

$bal = []; 
 
 foreach ($user as $key => $value) {
 	$bal[$value->surname.' '.$value->name][] = $value->ball;
 }
// dd($bal);
    return view('admink.kerivnuk.zvitthreecourse',compact('bal'));
}

public function planrozklad(Request $request){

$c = $request->course;
$d = $request->decatki;
$napr = $request->direction;

 $direction = Napravlenia::select('id', 'direction')->where('views', '=', '1')->orderBy('direction','asc')->get();
    
    //Запрос для вывода семинаров с оценками
   $seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title','lessons')
     ->where('seminar_temas.teor_nav', $request->direction)
     ->orderBy('npp', 'asc')
     ->get();

// dd($seminarse);
    return view('admink.planrozklad', compact('direction','seminarse','c', 'd','napr'));
}

public function planrozkladpost (Request $request){
 
   $data_request=$request->all();
      
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'decatki' && $key1 != 'course' && $key1 != 'direction') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }

 foreach ($data_insert as $key => $value2) {
  PlanRozklad::create([
    'seminar_title' =>$value2['seminar_title'],
    'date' =>$value2['date'],
    'pract' =>$value2['pract'],
    'seminar' =>$value2['seminar'],
    'user_id' => Auth::user()->id,
    'course' =>$request->course,
    'decatki' =>$request->decatki,
    'year' =>  Carbon::now()->format('Y'),
    'comm3' =>  $request->direction,
  ]);

}

  return back();

}
public function printplanroz (Request $request){

$c = $request->course;
$d = $request->decatki;
$napr = $request->direction;

$direction = Napravlenia::select('id', 'direction')->where('views', '=', '1')->orderBy('direction','asc')->get();
    
    //Запрос для вывода семинаров с оценками
   $seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->leftjoin('planrozklads', 'seminar_temas.id', '=', 'planrozklads.seminar_title' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title','lessons','planrozklads.date','planrozklads.pract','planrozklads.seminar')
     ->where('seminar_temas.teor_nav', $request->direction)
     ->orderBy('npp', 'asc')
     ->get();


  return view('admink.printplanroz', compact('direction','seminarse','c', 'd','napr'));
}


public function passallball (Request $request){

$c = $request->course;
$d = $request->decatki;

 $direction =DB :: select("select * from napravlenias where view_menu = 1 order by npp "); 

 $result = DB :: select("select user_id, comment, direction, ballfinish from allsemballs  where courses = '$c' group by user_id, direction, comment,ballfinish order by comment");

 $result1 = array();

 foreach ($result as $l) {
 
 $result1[$l->user_id]['surname'] = $l->comment;
 
  if($l->direction == 21){
  $result1[$l->user_id]['orgh'] = $l->ballfinish;
 }else{
     $result1[$l->user_id]['orgh'] = "";
 }


 if($l->direction == 2){
  $result1[$l->user_id]['abd'] = $l->ballfinish;
 }else{
   $result1[$l->user_id]['abd']  = "";
 }
  if($l->direction == 25){
  $result1[$l->user_id]['abd1'] = $l->ballfinish;
 }

 if($l->direction == 3){
  $result1[$l->user_id]['tor'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['tor'] = "";
 }

  if($l->direction == 26){
  $result1[$l->user_id]['tor1'] = $l->ballfinish;
 }

  if($l->direction == 4){
  $result1[$l->user_id]['proc'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['proc'] = "";
 }
  if($l->direction == 11){
  $result1[$l->user_id]['amb'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['amb'] = "";
 }

  if($l->direction == 5){
  $result1[$l->user_id]['ur'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['ur'] =  "";
 }
 if($l->direction == 23){
  $result1[$l->user_id]['sud1'] = $l->ballfinish;
 }

  if($l->direction == 6){
  $result1[$l->user_id]['sud'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['sud'] = " ";
 }

  if($l->direction == 7){
  $result1[$l->user_id]['gn'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['gn'] = ""; 
 }
   if($l->direction == 24){
  $result1[$l->user_id]['gn1'] = $l->ballfinish;
 }

  if($l->direction == 8){
  $result1[$l->user_id]['kr'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['kr'] ="";
 }

  if($l->direction == 9){
  $result1[$l->user_id]['opk'] = $l->ballfinish;
 }else{
    $result1[$l->user_id]['opk'] = "";
 }
  if($l->direction == 22){
  $result1[$l->user_id]['opk1'] = $l->ballfinish;
 }

 if($l->direction == 10){
  $result1[$l->user_id]['war'] = $l->ballfinish;
 }
 
 } 
 



 // dd($result1);

return view('admink.passallball', compact('c', 'd', 'result', 'direction', 'result1'));
}

public function reportmarks (Request $request) {

// 1. Берём все темы семинара (ВСЕ 60!)
$themes = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.morning','seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title','lessons')
     ->where('seminar_temas.teor_nav', $request->direction)
     ->orderBy('seminar_temas.npp', 'asc')
     ->get();

// 2. Берём студентов
$students = DB::table('user_profiles')
    ->where('startyear', $request->year)
    ->where('decatki', $request->decatki)
    ->orderBy('surname','asc')
    ->get();

// 3. Берём оценки только этих студентов
$studentIds = $students->pluck('user_id')->toArray();

// Получаем список всех студентов (для шапки таблицы)
$studentList = $students->mapWithKeys(function ($student) {
    return [
        $student->user_id => $student->surname . ' ' . $student->name
    ];
});

$grades = DB::table('ocenki_tables')
    ->where('id_seminarus', $request->direction)
    ->whereIn('user_id', $studentIds)
    ->get();

// 4. Формируем результат
// 4. Формируем вложенный массив
$result = [];

foreach ($themes as $theme) {
    $themeStudents = [];

    foreach ($students as $student) {
        // ищем оценку для текущего студента по текущей теме
        $grade = $grades->first(function($g) use ($student, $theme) {
            return $g->user_id == $student->user_id && $g->tema == $theme->id;
        });

        $themeStudents[] = [
            'user_id' => $student->user_id,
            'surname' => $student->surname.' '.$student->name,
            'ocenka' => $grade->bal ?? null, // null если оценки нет
            'lessons' => $grade->lessons ?? null, // null если оценки нет

        ];
    }

    $result[] = [
        'tema_id' => $theme->id,
        'tema_name' => $theme->tema,
        'seminar_title' => $theme->title,
        'students' => $themeStudents,
        'npp' => $theme->npp
    ];
}

    // dd($studentList);

return view('admink.reportmarks', compact('result','studentList'));

}

}  

