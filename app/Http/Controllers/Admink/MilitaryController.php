<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\UserProfile;
use App\ModelAdmink\Military;
use App\OcenkiTables;

class MilitaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $c = $request->course;
       $d = $request->decatki;
 
$intern=DB::select("select user_profiles.user_id,user_profiles.decatki, user_profiles.surname, user_profiles.name, mocenki1.id, mocenki1.id_seminar, mocenki1.id_seminarus as direction, mocenki1.bal, mocenki1.lessons, mocenki1.tema as id_tema, mocenki2.suma1, mocenki1.npp FROM user_profiles 

left join (select military.id,military.user_id, military.id_seminar, military.id_seminarus, military.lessons, military.bal, military.tema, seminar_temas.npp from military, seminar_temas where military.id_seminarus=10
and military.tema=seminar_temas.id ORDER BY seminar_temas.npp ) as mocenki1
 ON user_profiles.user_id=mocenki1.user_id 
   
left join (select military.user_id, sum(military.bal) as suma1 from military
 where military.id_seminarus=10 group by military.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where  user_profiles.course ='$c' and user_profiles.decatki ='$d' order by mocenki1.npp, user_profiles.surname  ");
// dump($intern);
// exit();
//Обрабатываем список студентов с оценками для 1 курса и передаем во вью
 $result1 = array();
  foreach ($intern as $l) {
 $result1[$l->user_id]['user_id'] = $l->user_id;
  $result1[$l->user_id]['surname'] = $l->surname;
 $result1[$l->user_id]['name'] = $l->name;
 $result1[$l->user_id]['direction'] = '10';
 $result1[$l->user_id]['id'][] = $l->id;
 $result1[$l->user_id]['id_tema'][] = $l->id_tema;
 $result1[$l->user_id]['bal'][] = $l->bal;
 $result1[$l->user_id]['lessons'][] = $l->lessons;
 $result1[$l->user_id]['npp'][] = $l->npp;
 $result1[$l->user_id]['suma1'] = $l->suma1;
   }

   // dump($result1);
   // exit();
$sumaone = DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name, user_profiles.decatki, user_profiles.course,
 mocenki.id_seminar, mocenki.suma, mocenki2.suma1 FROM user_profiles

left join(select military.user_id, military.id_seminar, sum(military.bal) as suma from military where military.id_seminarus=10 group by military.user_id, military.id_seminar ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id 

left join (select military.user_id, sum(military.bal) as suma1 from military
 where military.id_seminarus=10 group by military.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where
user_profiles.course ='$c' and user_profiles.decatki ='$d' order By  mocenki.id_seminar");


$suma = array();
  foreach ($sumaone as $l) {
 $suma[$l->user_id]['user_id'] = $l->user_id;
 $suma[$l->user_id]['surname'] = $l->surname;
 $suma[$l->user_id]['name'] = $l->name;
 $suma[$l->user_id]['suma1'] = $l->suma1;
 $suma[$l->user_id]['suma'][] = $l->suma;
 } 
//  foreach($suma as  $sumas)

// dump($sumas['suma']);
// exit();
//Юнион запрос для вывода семинаров с оценками
$seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element')
            ->where('seminarus.direction', '10')
            ->orderBy('npp', 'asc');
//Юнион запрос для вывода семинаров с оценками  и его передаем во вью
$seminar = DB::table('seminarus')
 ->select('id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main', 'pract_nav', 'direction','teor_nav','element')
->union($seminarse)
->where('seminarus.direction', '10')
->orderBy('id_seminar')
->orderBy('npp')
->get();


$direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.min_bal' )
            ->where('napravlenias.id', '10')
            ->get(); 

$res=DB::table('seminar_temas')
            ->select("seminar_temas.id",'seminar_temas.id_seminar',  "seminar_temas.npp", "seminar_temas.teor_nav")
            ->where('seminar_temas.teor_nav', '10')
            ->orderBy('npp', 'asc')
             ->get();

    return view('admink.military',compact('intern','c','d','seminar','direction','res','suma','result1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // dump($request);
    //     exit();
   $data_request=$request->all();
       
    $currentUser = $request->user_id;
    $id_seminarus =$request->id_seminarus;
      // dump($id_seminarus);
      //   exit();
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
    $tema = $value3['tema'];
    $bal = $value3['bal'];
    $lessons = $value3['lessons'];
       // dump( $value3);
      //   exit();
  Military::update_ocenki($id, $user_id, $id_seminar,$id_seminarus, $tema, $bal,$lessons);
    }
 
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
