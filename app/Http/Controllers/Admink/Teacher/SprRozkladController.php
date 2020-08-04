<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateTime;
use DateInterval;
use App\helpers;

class SprRozkladController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $decatki = $request->decatki; 
     $teacher = DB::table('teacher_names')
   ->select('teacher_names.*')
   ->orderby('teacher_names.namelong', 'asc')
   ->get();
   
$napr = DB::select("select modul_hour.* , b.in_days, (modul_hour.days-b.in_days) as min  FROM modul_hour
    
    left join (SELECT id_napravlenie, SUM(in_day) as in_days FROM rozklad_moduls where decatki = '$decatki' group by id_napravlenie ) as b
on modul_hour.id=b.id_napravlenie
   ");

   $modul= DB::table('rozklad_moduls')
    ->leftjoin('modul_hour', 'rozklad_moduls.id_napravlenie', '=', 'modul_hour.id' )
    
   ->select('rozklad_moduls.*','modul_hour.name_napravlenie','modul_hour.days')
   ->get();


$dec = DB::table('register_decatki')
         ->select('register_decatki.*')
         ->where('course','=', '1')
         ->where('year','=', '2019')
          ->orderby('id','desc')
         ->first();
   // dump($dec);
   //      exit();

 
$test = DB::select("select calendars.* , b.id_napravlenie, b.decatki,b.dates,b.in_day, a.name_napravlenie FROM calendars
  
    left join (SELECT id_napravlenie,decatki, dates,in_day FROM rozklad_moduls group by id_napravlenie,decatki,dates,in_day ) as b
on calendars.curdate=b.dates

left join (SELECT modul_hour.* FROM modul_hour) as a
on b.id_napravlenie=a.id

where curdate Between  '2020-09=01' and '2021-02-28' order by curdate asc
   ");
// dump($test);
// exit();
$test1 = [];
foreach($test as $key1 => $n2){
   //$lessons[$n1->decatki][$n1->month][$n1->day] = $n1->direction . ',' . $n1->nameshort;
    for($i = 1; $i <= $n2->daymont; ++$i){ 
 //     dump($n1->in_day);
 // exit();
 $test1[$n2->montyear][$n2->decatki][$n2->curdate] = $n2->name_napravlenie; 
 $test1[$n2->montyear][$n2->decatki]['curdate'][]= $n2->curdate; 

      //$n2->day++;
 // $lessons[$n1->month][$n1->decatki]['year'] =  $n1->year;  
   }
   if($n2->montyear==9)
   $test1['mon9']['curdate'][]= $n2->curdate;
  $test1['mon9'][$n2->decatki] = $n2->decatki;
  for($i = 1; $i <= $n2->in_day; ++$i){ 
$test1['mon9'][$n2->curdate][] = $n2->name_napravlenie; 
      //$n2->daymont++;
 // $lessons[$n1->month][$n1->decatki]['year'] =  $n1->year;  
   }

if($n2->montyear==10)
   $test1['mon10']['curdate'][]= $n2->curdate;
   //foreach($n1 as $key2 => $n2){
      
   //}
}
// dump($test1);
// exit();
$begin = new DateTime( '2020-09-07' );
$end = new DateTime( '2020-09-21' );
$end = $end->modify( '+1 day' ); 

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);
 $array=[];
foreach($daterange as $date){
    // echo $date->format('Y-m-d')  . "<br>";
     $array[] = $date->format('Ymd');
}
// dump($array);
// exit();
         $n = DB::select("
   select decatki, name_napravlenie, modul_hour.id as ids, nameshort, dates, year(dates) as year, month(dates) as month, day(dates) as day, in_day, day(datep) as dayfinish, calendars.typedat from rozklad_moduls, teacher_names, modul_hour, calendars
where teacher_names.id=rozklad_moduls.id_teacher and
modul_hour.id=rozklad_moduls.id_napravlenie and rozklad_moduls.dates=calendars.curdate
   order by decatki,year
   ");
// print_r($n); die; 
     // dump($n);
     //     exit();
         //Пустой массив
$lessons = [];
// dump($lessons);
//  exit();
//Перебираем
foreach($n as $key1 => $n1){

 //    dump($n1);
 // exit();
   //$lessons[$n1->decatki][$n1->month][$n1->day] = $n1->direction . ',' . $n1->nameshort;
   for($i = 1; $i <= $n1->in_day; ++$i){ 
 //     dump($n1->in_day);
 // exit();
 $lessons[$n1->month][$n1->decatki][$n1->day] = $n1->name_napravlenie . ',' . $n1->nameshort; 
       $n1->day++;


 // $lessons[$n1->month][$n1->decatki]['year'] =  $n1->year;  
   }
   //foreach($n1 as $key2 => $n2){
      
   //}
}
//print_r($lessons); die; 
////////////////////////////////////// 

dump($lessons);
 exit();
//}   


// $calendar = array();
//  foreach ($n as $l) {
//  $calendar[$l->curdate]['curdate'] = $l->curdate;
//  $calendar[$l->curdate]['typedat'] = $l->typedat;
//  $calendar[$l->curdate]['daymont'] = $l->daymont;
//  $calendar[$l->curdate]['decatki'] = $l->decatki;
//  $calendar[$l->curdate]['ndayweek'] = $l->ndayweek;
//  $calendar[$l->curdate]['in_day'] = $l->in_day;
//  $calendar[$l->curdate]['name_napravlenie'][] = $l->name_napravlenie;
//  $calendar[$l->curdate]['dates'] = $l->dates;
//  // $calendar[$l->curdate]['id_napravlenie'][] = $l->id_napravlenie;
//  // $result2[$l->curdate]['decatki'][] = $l->decatki;
 
// }   



return view('admink.kerivnuk.sprav_rozklad',compact('teacher', 'napr','modul','decatki','lessons','array'));
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
    public function store(Request $request)
    {
        // dump($request);
        // exit();
$year = \Carbon\Carbon::parse($request->datas)->format('Y');

 // все выходные дни

$holidaysa =DB::table('calendars')
        ->where('nyear', $year)
        // ->where('typedat','=','1')
        ->where('typedat','=','0')
        ->select ('curdate')
        ->get()->values()->all();
      
         $holidays= [];
    foreach ($holidaysa as $holidayss) {
  
             $holidays[] = $holidayss->curdate;
        
    }
// dump($holidays);
// exit();
// $unavailablePerioderr = [['2020-08-05', '2020-08-07'], ['2020-08-12', '2020-08-14']]; // занятые периоды дней

// dump($unavailablePerioderr);
// exit();


$unavailablePeriod= DB::table('rozklad_moduls')
   ->select ('dates', 'datep')
   ->where('decatki', '1')
   ->get()->values()->all();
// dump($unavailablePeriod);
// exit();
   //МАссив всех дат по дням в которые занимаются мнтерны
$unavailableDates = convertPeriodToDates($unavailablePeriod);
// dump($unavailableDates);
// exit();

$startDate = $request->datas; // дата которую ввел учитель
// dump($startDate);
// exit();
$quantityOfDAys = $request->datap; // количество дней
// dump($quantityOfDAys);
// exit();

$endDate = Carbon::parse($startDate);
// dump($endDate);
// exit();

$addedDaysNotFull = true;
$addedDays = 1;
while ($addedDaysNotFull) {

    if (!in_array($endDate->format('Y-m-d'), $holidays) && !in_array($endDate->format('Y-m-d'), $unavailableDates)) {

        if ($addedDays == $quantityOfDAys){
            $addedDaysNotFull = false;
            continue;
        }

        $endDate->addDay();
        $addedDays++;
    }else{
       return back()->with('message-updated', __('Дата вже е в розкладі...'));
            }
}

// var_dump($endDate);
// exit();
// if (isset($data_request['enter'])){
$data_request=$request->all();
       DB::table('rozklad_moduls')
     ->insert(['id_teacher'=> $data_request['teacher'],
        'id_napravlenie'=> $data_request['predmet'],
        'course'=> 1,
        'decatki'=> $data_request['decatkis'],
        'dates'=> $startDate,
        'datep'=>$endDate,
        'year'=> Carbon::now()->format('y'),
        'in_day'=>  $quantityOfDAys,
        'created_at'=>Carbon::now()
 ]);
// }




     
 
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
