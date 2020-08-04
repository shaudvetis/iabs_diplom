<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\ModelSeminar\KafedraName;
use App\ModelSeminar\TeacherName;
use App\ModelAdmink\Calendar;
use App\ModelSeminar\Event;
use DB;

class SeminarTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//echo "Ближайший понедельник  " .date('Y-m-d', strtotime('monday this week' )); 
$do=date('Y-m-01'); 
$mon=$request->calendars.'-01';
//        dump($mon);
// exit();
$rr=date('Y-m-d', strtotime('monday this week', strtotime($do)));
//       dump($rr);
// exit(); 
$date =new \Datetime('last monday');

$rre=date('Y-m-01');

//       dump( $rre);
// exit(); 
// echo "Ближайший понедельник будет " . (($day - $day +1) + sprintf("%d", $date)) . ".{$month}";
$Date = Carbon::now();
$timestamp = strtotime($Date);
$year = date('d', $timestamp);

 if (empty($request->calendars)){
    $s= Carbon::now();
    $er=date("N");
    $tt=Carbon::now()->addDays(-$er+1);
    $calendars = $rr;
//       dump( $calendars);
// exit(); 
      $ty=\Carbon\Carbon::parse($rre)->addMonth()->format('Y-m-d');
      $qs=DB::table('calendars')
         ->select('calendars.ndayweek')
         ->where('curdate','=',$ty)->get();
    if ($ty!==7)

       $calendarpo = date('Y-m-d', strtotime('last sunday this week', strtotime($ty)));
      //  \Carbon\Carbon::parse($rre)->addMonth()->format('Y-m-d');


 //      dump( $calendarpo);
 // exit(); 
  }else {

$forj=$request->calendars;
$qw=DB::table('calendars')
         ->select('calendars.ndayweek')
         ->where('curdate','=',$forj)->get();
    if ($qw!==1)

$calendars=date('Y-m-d', strtotime('monday this week', strtotime($forj)));



//$cals=$request->calendarpo;

$cal=\Carbon\Carbon::parse($forj)->addMonth()->format('Y-m-d');
$lk=DB::table('calendars')
         ->select('calendars.ndayweek')
         ->where('curdate','=',$cal)->get();

// dump($lk);
// exit(); 
    if ($lk!==7)
$calendarpo=date('Y-m-d', strtotime('sunday this week', strtotime($cal)));

}
// dump($year);
// exit(); 
$shift = $request->calendars;
// dump($calendarpo);
// exit(); 

$calendar = DB::table('calendars')
         ->select('calendars.*')
         ->whereBetween('curdate',[$calendars, $calendarpo])
        ->get();

//    dump($calendar);
// exit();


// $lessons = DB::table('teacher_names')
//          ->select('namelong', 'position')
//          ->get();

        return view ('admink.kerivnuk.rozklad', compact('calendar','shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $insertArr = [ 'title' => $request->title,
'start_date' => $request->start,
'end_date' => $request->end
];
$event = Event::insert($insertArr);
return Response::json($event);
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
        // exit();
        $data_request=$request->all();
        $data_insert = array();

        // $str=strpos($row, "-");
        // $row=substr($row, 0, $str);
 
    foreach($data_request as $key1 => $value1) {
       if($key1 != '_token') 
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
       }     
   }
//      dump( $data_insert);
// exit();
foreach ($data_insert as  $value3) {
   if($value3['typedat'] != 'on') {
    $typedat = $value3['typedat'];
    $ex=explode("-", $typedat);
//      dump($ex[1]);
// exit();
        $id_rozklad = $ex[1];
     $go = DB::table("calendars")
        ->where('id',$id_rozklad)
         ->update(['typedat'=> 0,
        'created_at'=>Carbon::now()
 ]);
 }
// if($value3['typedat'] == 'on') {
//     $typedat = $value3['typedat'];
//     $ex=explode("-", $typedat);
// //      dump($ex[1]);
// // exit();
//      $id_rozklad = $ex[1];
//      $go = DB::table("calendars")
//         ->where('id',$id_rozklad)
//         ->update(['typedat'=> 1,
//         'created_at'=>Carbon::now()
//  ]);
//  }



// if ($go->created_at != Carbon::now()->format('Y')) 
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
        $where = array('id' => $request->id);
$updateArr = ['title' => $request->title,'start_date' => $request->start, 'end_date' => $request->end];
$event  = Event::where($where)->update($updateArr);
return Response::json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::where('id',$request->id)->delete();
return Response::json($event);
    }
}
