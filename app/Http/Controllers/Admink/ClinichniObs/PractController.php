<?php

namespace App\Http\Controllers\Admink\ClinichniObs;

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
use View;
class PractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function getpractnav (Request $request,$id)
    {

       $c = $request->course;
       $d = $request->decatki;

       if ($request->ordinator==1) {
        //Выборка ordinator
 $results1 = DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name,user_profiles.decatki,
 mocenki.id_seminarus,  mocenki.one, mocenki.two, mocenki.three, mocenki.four, mocenki.five,
 mocenki.six, mocenki.seven, mocenki.eight, mocenki.nine, mocenki1.suma1, mocenki2.countdiagnos  FROM user_profiles 

 left join (select controlmodyls.* from controlmodyls  where controlmodyls.id_seminarus='$request->id' ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id 

 left join (select inputformsdays.direction, inputformsdays.id_student, COUNT(inputformsdays.diagnoses) as countdiagnos from inputformsdays  where inputformsdays.direction='$request->id' and created_at >= now()-interval 1 month group by id_student, direction) as mocenki2 
ON  user_profiles.user_id = mocenki2.id_student 

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma1 from controlmodyls where controlmodyls.id_seminarus='$request->id' group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki1 
 ON  user_profiles.user_id = mocenki1.user_id 

 where user_profiles.course ='$request->courses' and user_profiles.clordinator ='$request->ordinator' order By user_profiles.surname");
       }
       else {
//Выборка 1 курс
 $results1 = DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name,user_profiles.decatki,
 mocenki.id_seminarus,  mocenki.one, mocenki.two, mocenki.three, mocenki.four, mocenki.five,
 mocenki.six, mocenki.seven, mocenki.eight, mocenki.nine, mocenki1.suma1, mocenki2.countdiagnos  FROM user_profiles 

 left join (select controlmodyls.* from controlmodyls  where controlmodyls.id_seminarus='$request->id' ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id 

 left join (select inputformsdays.direction, inputformsdays.id_student, COUNT(inputformsdays.diagnoses) as countdiagnos from inputformsdays  where inputformsdays.direction='$request->id' and created_at >= now()-interval 1 month group by id_student, direction) as mocenki2 
ON  user_profiles.user_id = mocenki2.id_student 

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma1 from controlmodyls where controlmodyls.id_seminarus='$request->id' group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki1 
 ON  user_profiles.user_id = mocenki1.user_id 

 where user_profiles.course ='$c' and user_profiles.decatki ='$d' order By user_profiles.surname");
}
//Вывод номера направления и отправка его в таблицу с оценками
 $directions = Napravlenia::find($id); 
 $id=$request->id;
  // dump($results1);
  //       exit();

 return view('admink.clinichniobs.practnavuchka',compact('results1','c','d','id','directions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function postpractnav(Request $request, Controlmodyl $controlmodyl)
    {

  $data_request = $request->all();
  // dump($data_request);
  // exit();

 if($controlmodyl->where('user_id', $data_request['user_id'])
  ->where('id_seminarus', $request['id_seminarus'])
                ->update(
['one' => $data_request['one'],'two' => $data_request['two'],'three' => $data_request['three'],
'four' => $data_request['four'],
'five' => $data_request['five'],
'six' => $data_request['six'],
'seven' => $data_request['seven'],
'eight' => $data_request['eight'],
'nine' => $data_request['nine']]
        ));
else $controlmodyl->insert(
['user_id'=>$data_request['user_id'],
'id_seminarus'=>$data_request['id_seminarus'],
'one' => $data_request['one'],'two' => $data_request['two'],'three' => $data_request['three'],
'four' => $data_request['four'],
'five' => $data_request['five'],
'six' => $data_request['six'],
'seven' => $data_request['seven'],
'eight' => $data_request['eight'],
'nine' => $data_request['nine']]
        );

        return back();
       
    }


}
