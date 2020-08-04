<?php

namespace App\Http\Controllers\Admink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use App\UserProfile;
use App\OcenkiTables;
use App\Intern\SeminarTema;
use Carbon\Carbon;
use Symfony\Component\Console\Helper\ProgressBar;


class BallstartController extends Controller
{
    public function getStart(Request $request){

$c = $request->course;
$d = $request->decatki;


 //Получает список студентов с оценками для 1 десятка
$results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select ocenki_tables.id,ocenki_tables.user_id, ocenki_tables.id_seminar, ocenki_tables.id_seminarus, ocenki_tables.lessons, ocenki_tables.bal, ocenki_tables.tema, seminar_temas.npp from ocenki_tables, seminar_temas where ocenki_tables.id_seminarus=1 
and ocenki_tables.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables
 where ocenki_tables.id_seminarus=1 group by ocenki_tables.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 
where  user_profiles.course ='$c' and user_profiles.decatki ='$d' order by mocenki1.npp, user_profiles.surname");
// dump($results1);
// exit();
//Обрабатываем список студентов с оценками для 1 курса и передаем во вью
 $result1 = array();
  foreach ($results1 as $l) {
 $result1[$l->user_id]['user_id'] = $l->user_id;
  $result1[$l->user_id]['surname'] = $l->surname;
 $result1[$l->user_id]['name'] = $l->name;
 $result1[$l->user_id]['direction'] = '2';
 $result1[$l->user_id]['id'][] = $l->id;
 $result1[$l->user_id]['id_tema'][] = $l->id_tema;
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
 left join(select ocenki_tables.user_id, ocenki_tables.id_seminar, sum(ocenki_tables.bal) as suma from ocenki_tables where ocenki_tables.id_seminarus=1 group by ocenki_tables.user_id, ocenki_tables.id_seminar ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id where
user_profiles.course ='$c' and user_profiles.decatki ='$d' order By  mocenki.id_seminar");
$suma = array();
  foreach ($sumaone as $l) {
 $suma[$l->user_id]['user_id'] = $l->user_id;
 $suma[$l->user_id]['surname'] = $l->surname;
 $suma[$l->user_id]['name'] = $l->name;
 $suma[$l->user_id][] = $l->suma;
 } 
 // dump($suma);
 // exit();
// Счет порядкового номера
 $res=DB::table('seminar_temas')
            ->select("seminar_temas.id",'seminar_temas.id_seminar',  "seminar_temas.npp", "seminar_temas.teor_nav")
            ->where('seminar_temas.teor_nav', '1')
            ->orderBy('npp', 'asc')
             ->get();

//Юнион запрос для вывода семинаров с оценками
$seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element')
            ->where('seminarus.direction', '1')
            ->orderBy('npp', 'asc');
//Юнион запрос для вывода семинаров с оценками  и его передаем во вью
$seminar = DB::table('seminarus')
 ->select('id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main', 'pract_nav', 'direction','teor_nav','element')
->union($seminarse)
->where('seminarus.direction', '1')
->orderBy('id_seminar')
->orderBy('npp')
->get();
// dump($seminar);
// exit();
//Вывод номера направления и отправка его в таблицу с оценками
 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.min_bal' )
            ->where('napravlenias.id', '1')
            ->get(); 

 //Работа с датой
// setlocale(LC_ALL, 'rus_RUS');
$date = new Carbon(); 
setlocale(LC_TIME, 'Russian');
$date = iconv("windows-1251","utf-8", $date->formatLocalized('%A %d %B'));

return view('admink.ball_start',compact('direction','date','c','seminar','suma','res','result1','d'));
    }
    
public function getStartpost(Request $request, OcenkiTables $ocenki){
    // dump($request);
    //     exit();
   $data_request=$request->all();
       
    $currentUser = $request->user_id;
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'sub') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
    }
      // dump($data_insert);
      //   exit();
       foreach ($data_insert as  $value3) {
    $id = $value3['id_auto'];
    $user_id = $value3['user_id']; 
    $id_seminar = $value3['id_seminar'];
    $id_seminarus = $value3['id_seminarus'];
    $tema = $value3['tema'];
    $bal = $value3['bal'];
    $lessons = $value3['lessons'];
       // dump( $value3);
      //   exit();
  OcenkiTables::update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema, $bal,$lessons);
    }
 
        return back();
       
    }
}

