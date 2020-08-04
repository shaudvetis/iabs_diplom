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


class GrudnaclinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

$a = $request->course;
$b = $request->decatki;
$c = $request->navuchka;
       
 //Вывод номера направления и отправка его в таблицу с оценками
 $direction1 = Napravlenia::select('id')->where('id','3')->get();
 foreach ($direction1 as $direction) {
   $direction->id;
}

 //Выборка 1 курс
 $results1 = DB::select("select user_profiles.user_id, user_profiles.surname,user_profiles.name,user_profiles.decatki,
 mocenki.id_seminarus,  mocenki.one, mocenki.two, mocenki.three, mocenki.four, mocenki.five,
 mocenki.six, mocenki.seven, mocenki.eight, mocenki.nine, mocenki1.suma1  FROM user_profiles 

 left join (select controlmodyls.user_id, controlmodyls.id_seminarus, controlmodyls.one, controlmodyls.two, controlmodyls.three, controlmodyls.four, controlmodyls.five,
 controlmodyls.six, controlmodyls.seven, controlmodyls.eight, controlmodyls.nine from controlmodyls  where controlmodyls.id_seminarus=3 ) as mocenki 
ON  user_profiles.user_id = mocenki.user_id 

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma1 from controlmodyls where controlmodyls.id_seminarus=3 group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki1 
 ON  user_profiles.user_id = mocenki1.user_id 

 where user_profiles.course ='$a' and user_profiles.decatki ='$b' order By user_profiles.surname");

// dump($controlmodyl);
// exit();

 return view('admink.clinichniobs.grudnaclinobs', compact('direction','results1', 'a', 'b'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request, Controlmodyl $controlmodyl)
    {

  $data_request = $request->all();
  // dump($data_request);
  // exit();

  if($controlmodyl->where('user_id', $data_request['user_id'])
  ->where('id_seminarus', '3')
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
