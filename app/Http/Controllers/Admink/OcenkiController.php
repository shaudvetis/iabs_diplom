<?php

namespace App\Http\Controllers\Admink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use App\UserProfile;
use App\OcenkiTables;
use App\Pract_nav;
use App\Military;
use App\Intern\SeminarTema;
use Carbon\Carbon;
use Symfony\Component\Console\Helper\ProgressBar;


class OcenkiController extends Controller
{
    public function getocenki(Request $request, $id){

$c = $request->course;
$d = $request->decatki;
 
 // dump($request);
 // exit();

 if ($id==10){
 //Получает список студентов с оценками для 1 десятка
$results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.tema as id_tema, mocenki1.element, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select military.id,military.user_id, military.id_seminar, military.id_seminarus, military.lessons, military.bal, military.tema, seminar_temas.npp, military.element from military, seminar_temas where military.id_seminarus='$request->id'
and military.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select military.user_id, sum(military.bal) as suma1 from military
 where military.id_seminarus='$request->id' group by military.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where  user_profiles.course ='$c' and user_profiles.decatki ='$d' and user_profiles.course !=12 order by mocenki1.npp, user_profiles.surname  ");
} else if ($request->ordinator==1)
{
  $results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, user_profiles.clordinator, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.element, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select ocenki_tables.id,ocenki_tables.user_id, ocenki_tables.id_seminar, ocenki_tables.id_seminarus, ocenki_tables.lessons, ocenki_tables.bal, ocenki_tables.tema, seminar_temas.npp, ocenki_tables.element from ocenki_tables, seminar_temas where ocenki_tables.id_seminarus='$request->id'
and ocenki_tables.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables
 where ocenki_tables.id_seminarus='$request->id' group by ocenki_tables.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

 where  user_profiles.course ='$request->courses' and user_profiles.clordinator ='$request->ordinator' and user_profiles.course !=12 

order by mocenki1.npp, user_profiles.surname");
}
else {
  $results1=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.element, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select ocenki_tables.id,ocenki_tables.user_id, ocenki_tables.id_seminar, ocenki_tables.id_seminarus, ocenki_tables.lessons, ocenki_tables.bal, ocenki_tables.tema, seminar_temas.npp, ocenki_tables.element from ocenki_tables, seminar_temas where ocenki_tables.id_seminarus='$request->id'
and ocenki_tables.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables
 where ocenki_tables.id_seminarus='$request->id' group by ocenki_tables.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 
where  user_profiles.course ='$c' and user_profiles.decatki ='$d' and user_profiles.course !=12 order by mocenki1.npp, user_profiles.surname");
}
// dump($results1);
// exit();
//Обрабатываем список студентов с оценками для 1 курса и передаем во вью
 $result1 = array();
  foreach ($results1 as $l) {
 $result1[$l->user_id]['user_id'] = $l->user_id;
  $result1[$l->user_id]['surname'] = $l->surname;
 $result1[$l->user_id]['name'] = $l->name;
 $result1[$l->user_id]['direction'] = $request->id;
 $result1[$l->user_id]['id'][] = $l->id;
 $result1[$l->user_id]['id_tema'][] = $l->id_tema;
 $result1[$l->user_id]['bal'][] = $l->bal;
 $result1[$l->user_id]['lessons'][] = $l->lessons;
 $result1[$l->user_id]['npp'][] = $l->npp;
 $result1[$l->user_id]['suma1'] = $l->suma1;
 $result1[$l->user_id]['element'][] = $l->element;
  }

//   dump($result1);
// exit();

//Формируем нумерацию тем и макс бал по направлению
 $res=DB::table('seminar_temas')
   ->select("seminar_temas.id",'seminar_temas.id_seminar',  "seminar_temas.npp", "seminar_temas.teor_nav",'seminar_temas.tema','seminar_temas.morning','seminar_temas.element')
     ->where('seminar_temas.teor_nav', $request->id)
     ->orderBy('npp', 'asc')
     ->get();
//Запрос для вывода семинаров с оценками
$seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.morning','seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title','lessons')
     ->where('seminar_temas.teor_nav', $request->id)
     ->orderBy('npp', 'asc')
     ->get();

// dump(intval($id));
// exit();
//Группировка по каждой теме семинара, таблица Загальни оценки
$ids=intval($id);
return view('admink.ocenki',compact('c','seminarse','res','result1','d', 'ids'));
    }
    
public function postocenki(Request $request, OcenkiTables $ocenki, Military $military){
    // dump($request);
    //     exit();
  
        $currentUser = Auth::user();
        $teacher_id= $currentUser->id;
    // dump($teacher_id);
    //     exit();
   $data_request=$request->all();
      
    $currentUser = $request->user_id;
    $data_insert = array(); 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token' && $key1 != 'sub' && $key1 != 'id_seminarus') 
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
    $id_seminarus = $request->id_seminarus;
    $tema = $value3['tema'];
    $bal = $value3['bal'];
    $lessons = $value3['lessons'];
      if ($bal ==2){
    $element = $value3['bal'];
            }
            else {
    $element = $value3['element'];         
            }
       // dump( $value3);
      //   exit();
    if ($id_seminarus==10){
      Military::update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema, $bal,$lessons,$element);
    } else {
      OcenkiTables::update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema, $bal,$lessons,$element,$teacher_id);
    }
  
    }
 
        return back();
       
    }


    public function summaseminar (Request $request)
    {

 
    
 if ($request->ajax() && $request->hook == 'summaseminar') {
   //Группировка по каждой теме семинара, таблица Загальни оценки
$sumaone = DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name, user_profiles.decatki, user_profiles.course,
 mocenki.id_seminar, mocenki.suma, mocenki.countseminar FROM user_profiles
 left join(select military.user_id, military.id_seminar, sum(military.bal) as suma, count(military.id_seminar) as countseminar from military where military.id_seminarus='$request->direction' group by military.user_id, military.id_seminar ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id where
user_profiles.course ='$request->courses' and user_profiles.decatki ='$request->decatki' order By  mocenki.id_seminar");

$suma = array();
  foreach ($sumaone as $l) {
 $suma[$l->user_id]['user_id'] = $l->user_id;
 $suma[$l->user_id]['surname'] = $l->surname;
 $suma[$l->user_id]['name'] = $l->name;
 $suma[$l->user_id]['countseminar'] = $l->countseminar;
 $suma[$l->user_id][] = $l->suma;
 } 
            return response()->json([
                'table' => view("admink.summaseminar", ['suma' => $suma])->render(),
            ]);
        } 
    }



    public function practtema (Request $request, $id)
{
    
    $pract = Pract_nav::select('pract_name')->where('napr_id', $id)->get();

    $ids = $id;
    
    return view('admink.include.practnav',compact('pract', 'ids'));


}
    
}

