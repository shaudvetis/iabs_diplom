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

    $teacher = DB::table('teacher_names')
   ->select('teacher_names.*')
   ->orderby('teacher_names.namelong', 'asc')
   ->get();

  
   if(isset($request->month) && $request->hook=='tablemonth') {
      $month=\Carbon\Carbon::parse($request->month)->format('m');

     $n = DB::select("
   select rozklad_moduls.id, decatki, name_napravlenie, modul_hour.id as ids, nameshort, dates, datep,year(dates) as year, month(dates) as month, day(dates) as day,  year_start,rozklad_moduls.npp  from rozklad_moduls, teacher_names, modul_hour
where teacher_names.id=rozklad_moduls.id_teacher and
modul_hour.id=rozklad_moduls.id_napravlenie  and rozklad_moduls.year_start='$request->teach_year' and rozklad_moduls.decatki='$request->decatki' and month(dates)='$month'
  order by decatki,year
   ");
          // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("admink.kerivnuk.ajaxtablerozklad", ['n' => $n])->render(),
            ]);
        } 
      }
  if(isset($request->teach_year) && $request->hook=='tableyear') {
     
  $ns = DB::select("
   select decatki, name_napravlenie, modul_hour.id as ids, nameshort, dates, datep,year(dates) as year, month(dates) as month, day(dates) as day,  year_start, rozklad_moduls.npp  from rozklad_moduls, teacher_names, modul_hour
where teacher_names.id=rozklad_moduls.id_teacher and
modul_hour.id=rozklad_moduls.id_napravlenie  and rozklad_moduls.year_start='$request->teach_year' 
  order by decatki,year,dates asc
   ");
 $datesreqwest = [];
 foreach($ns as $key1 => $n3){
$datesreqwest[$n3->year][$n3->month][$n3->decatki][$n3->day]= $n3->name_napravlenie.'<br>'.$n3->nameshort;
}

//dd($datesreqwest);
 // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("admink.kerivnuk.tablerozkladyear", ['datesreqwest' => $datesreqwest])->render(),
            ]);
        } 
      }

return view('admink.kerivnuk.sprav_rozklad',compact('teacher'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      //Запрос на вывод направления по году поступления и десятку
        if(isset($request->decatki) && $request->hook=='napravlenie') {
        $decatki=$request->decatki;
        $year=$request->year;
  
   $napr=DB::select("select modul_hour.* ,  b.in_days, (modul_hour.days-b.in_days) as min  FROM modul_hour
    left join (SELECT id_napravlenie, count(dates) as in_days FROM rozklad_moduls   where decatki='$decatki' and year_start='$year' group by id_napravlenie ) as b
      on modul_hour.id=b.id_napravlenie
    ");

   $table=json_encode($napr);
   echo $table;
 }

 if(isset($request->npp) && $request->hook=='npp') {
  $year = \Carbon\Carbon::parse($request->month)->format('Y');
  $npp=DB::select("select seminar_temas.npp as npptema, teor_nav, m1.npp as uchtema  FROM seminar_temas 
      
      left join(select rozklad_moduls.*   FROM  rozklad_moduls where id_napravlenie='$request->npp' and year_start='$request->teach_year' and decatki='$request->decatki' and year='$request->month')as m1
      on seminar_temas.npp =m1.npp
      

     where seminar_temas.teor_nav='$request->npp' order by seminar_temas.npp asc ");
        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("admink.kerivnuk.ajaxnpp", ['npp' => $npp])->render(),
            ]);
        } 
 }
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$d=$request->data;
// $c=$request->npp;
$f=array();
$f=$request->data;  
 // $f = array_combine($d, $c);
 if(isset($request->name) && $request->name=='store')  {   

// dump($f);
// exit();
if(empty($f[1])){
  $po=$f[0];
}else{
   $po=$f[1];
}

  $getrozklad =  DB::select("select * from calendars where curdate >='$f[0]' AND curdate <= '$po' and typedat !=0 ");

foreach ($getrozklad as $key=> $value3) {

$year = \Carbon\Carbon::parse($value3->curdate)->format('Y');

  // $getrozklad =  DB::select("select id from rozklad_moduls where dates='$key'  and decatki='$request->decatki' and year_start='$request->teach_year' and year='$year' ");

// if(!empty($getrozklad)){
//  echo 'Дата вже має тему';

// }
// else{
   DB::table('rozklad_moduls')
     ->insert(['id_teacher'=> $request['ticher_id'],
        'id_napravlenie'=> $request['id_modul'],
        'course'=>$request['course'],
        'decatki'=>$request['decatki'],
        'dates'=>$value3->curdate,
        'datep'=>$value3->curdate,
        'year_start'=>$request['teach_year'],
        'year'=> $year,
        'created_at'=>Carbon::now()
 ]);
     }
    echo "Запис збереженно";
  // }


 
}

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
    public function destroy($id, Request $request)
    {
       if ($request->ajax()) {
       $delsprsop =  DB::table('rozklad_moduls')
       ->where('id', $id)->delete();
   
     } 
        return response ('Удалено');
   }
    
}
