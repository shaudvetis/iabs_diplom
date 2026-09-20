<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use App\UserProfile;
use App\OcenkiTables;
use App\Controlmodyl;
use App\Napravlenia;
use App\Intern\SeminarTema;
use Carbon\Carbon;

class PrintbalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printbal(Request $request)
    {
// dump($request);
// exit();

$c = $request->course;
$d = $request->decatki;
$dir = $request->id;

if($request->id == 10)
{
  $results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select military.id,military.user_id, military.id_seminar, military.id_seminarus, military.lessons, military.bal, military.tema, seminar_temas.npp from military, seminar_temas where military.id_seminarus='$request->id' 
and military.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select military.user_id, sum(military.bal) as suma1 from military
 where military.id_seminarus='$request->id' group by military.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 
where  user_profiles.course ='$c' and user_profiles.decatki ='$d' order by mocenki1.npp, user_profiles.surname");
} else if ($request->ordinator==1) {
 $results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select ocenki_tables.id,ocenki_tables.user_id, ocenki_tables.id_seminar, ocenki_tables.id_seminarus, ocenki_tables.lessons, ocenki_tables.bal, ocenki_tables.tema, seminar_temas.npp from ocenki_tables, seminar_temas where ocenki_tables.id_seminarus='$request->id' 
and ocenki_tables.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables
 where ocenki_tables.id_seminarus='$request->id' group by ocenki_tables.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 
where  user_profiles.course ='$request->courses' and user_profiles.clordinator ='$request->ordinator'order by mocenki1.npp, user_profiles.surname");
}
 else {

 //Получает список студентов с оценками для 1 десятка
$results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select ocenki_tables.id,ocenki_tables.user_id, ocenki_tables.id_seminar, ocenki_tables.id_seminarus, ocenki_tables.lessons, ocenki_tables.bal, ocenki_tables.tema, seminar_temas.npp from ocenki_tables, seminar_temas where ocenki_tables.id_seminarus='$request->id' 
and ocenki_tables.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables
 where ocenki_tables.id_seminarus='$request->id' group by ocenki_tables.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where  user_profiles.course ='$c' and user_profiles.decatki ='$d'  order by mocenki1.npp, user_profiles.surname");
}

// dump($results1);
// exit();
//Обрабатываем список студентов с оценками для 1 курса и передаем во вью
 $result1 = array();
  foreach ($results1 as $l) {
 $result1[$l->user_id]['id'] = $l->id;
 $result1[$l->user_id]['surname'] = $l->surname;
 $result1[$l->user_id]['name'] = $l->name;
 $result1[$l->user_id]['direction'] = $dir;
 $result1[$l->user_id]['bal'][] = $l->bal;
 $result1[$l->user_id]['lessons'][] = $l->lessons;
 $result1[$l->user_id]['npp'][] = $l->npp;
 $result1[$l->user_id]['suma1'] = $l->suma1;
   }
// dump($result1);
//  exit();

//Группировка по каждой теме семинара, таблица Загальни оценки
$sumaone = DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name, user_profiles.decatki, user_profiles.course,
 mocenki.id_seminar, mocenki.suma FROM user_profiles
 left join(select ocenki_tables.user_id, ocenki_tables.id_seminar, sum(ocenki_tables.bal) as suma from ocenki_tables where ocenki_tables.id_seminarus='$request->id'  group by ocenki_tables.user_id, ocenki_tables.id_seminar ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id where
user_profiles.course ='$c' and user_profiles.decatki ='$d' order By  mocenki.id_seminar");
$suma = array();
  foreach ($sumaone as $l) {
 $suma[$l->user_id]['user_id'] = $l->user_id;
 $suma[$l->user_id]['surname'] = $l->surname;
 $suma[$l->user_id]['name'] = $l->name;
 $suma[$l->user_id][] = $l->suma;
 } 


$data_rozklad= DB::table ('rozklad_moduls')
  ->leftjoin('modul_hour', 'rozklad_moduls.id_napravlenie', '=', 'modul_hour.id' )
   ->select('rozklad_moduls.id_napravlenie','dates','datep','modul_hour.modul')
     ->where('course', $c)
     ->where('decatki',$d)
     ->where('modul',$request->id)
     ->where('modul_hour.id','!=',$request->id)
     ->groupby('rozklad_moduls.dates','rozklad_moduls.id_napravlenie','dates','datep','modul_hour.modul')
     ->get();



     //  dump ($data_rozklad);
     // exit();

 $res=DB::table('seminar_temas')
   ->select("seminar_temas.id",'seminar_temas.id_seminar',  "seminar_temas.npp", "seminar_temas.teor_nav")
     ->where('seminar_temas.teor_nav', $request->id )
     ->orderBy('npp', 'asc')
     ->get();
   // dump ($res);
   //   exit();
//Юнион запрос для вывода семинаров с оценками
 $seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title','lessons')
     ->where('seminar_temas.teor_nav', $request->id )
     ->orderBy('npp', 'asc')
     ->get();
     // dump($seminarse);
     // exit();
//Вывод номера направления и отправка его в таблицу с оценками
 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.min_bal' )
            ->where('napravlenias.id', $request->id)
            ->get(); 

 
return view('admink.printball.printbal',compact('direction','dir','c','seminarse','suma','res','result1','d','data_rozklad'));
    }

    
}
