<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\UserProfile;
use App\ModelSeminar\Bazainternatyr;
use App\ModelSeminar\Otdeleniya;
use App\ModelSeminar\Rozkladz;
use DatePeriod;
use DateTime;
use DateInterval;


class RozkladzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getindex(Request $request)
  {

    $baza=Bazainternatyr::select('id','name_baza')->get();

    if ($request->ajax()) {

      $year=Carbon::now()->format('Y');

         switch ($request->name) {
         case 'getbazaintern':
        
        $year=Carbon::now()->format('Y');

          $intern = DB::select("select u.user_id as user, u.name, u.surname, u.course, u.startyear, m1.id, m1.bazainternatyr_id, m1.otdeleniya_id,m1.month, m1.name_month, m1.dates, m1.datep, m1.namebaza, m1.nameotdeleniya from user_profiles as u 
     
        Join (select rozkladzs.id, rozkladzs.otdeleniya_id,user_id, bazainternatyr_id, name_month, month, dates, datep,(select bazainternatyrs.name_baza from bazainternatyrs where rozkladzs.bazainternatyr_id=bazainternatyrs.id ) as namebaza, (select otdeleniyas.name_otdeleniya from otdeleniyas where rozkladzs.otdeleniya_id=otdeleniyas.id) as nameotdeleniya from rozkladzs where bazainternatyr_id='$request->id' and year >='$year'  order by rozkladzs.dates asc) as m1 on u.user_id=m1.user_id
  
         where u.course <= 3  order by m1.dates asc, u.surname asc");
        
         return  response()->json([
            'table' => view("admink.kerivnuk.include.brick-getrozkladzuser", ['intern' => $intern])->render(),
            ]); 
          
          break;
  
           case 'getallrozklad':
         
          $internlist = DB::select("select u.user_id as user, u.name, u.surname, u.course, m1.bazainternatyr_id, m1.otdeleniya_id,m1.month, m1.name_month, m1.dates, m1.datep, m1.namebaza, m1.nameotdeleniya from user_profiles as u 
     
          Join (select rozkladzs.otdeleniya_id,user_id, bazainternatyr_id, name_month, month, dates,datep,(select bazainternatyrs.name_baza from bazainternatyrs where rozkladzs.bazainternatyr_id=bazainternatyrs.id) as namebaza, (select otdeleniyas.name_otdeleniya from otdeleniyas where rozkladzs.otdeleniya_id=otdeleniyas.id) as nameotdeleniya from rozkladzs  where year >='$year'  order by dates asc) as m1 on u.user_id=m1.user_id
  
            where u.course <= 3 order by m1.namebaza, m1.dates asc");
            
            return response()->json([
            'table' => view("admink.kerivnuk.include.brick-getallrozklad", ['internlist' => $internlist])->render(),
            ]); 
           
           break;

             case 'otdeleniya':
             $otdeleniya=Otdeleniya::select('id','name_otdeleniya')->where('id_baza', $request->otdeleniya)->get();
          $otd=json_encode($otdeleniya);
         return $otd; 
           break;

            
          default:
             # code...
             break;
     }
  }
    
    return view ('admink.kerivnuk.rozkladz',compact('baza'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postrozkladz(Request $request)
    {


   $getdate=$request->month;

   $month=\Carbon\Carbon::parse($getdate)->format('m');

   $year=\Carbon\Carbon::parse($getdate)->format('Y');
   
   $dates=Carbon::parse($getdate)->startOfMonth()->format('Y-m-d');

   $datep=Carbon::parse($getdate)->endOfMonth()->format('Y-m-d');

    $monthsList = array(
   "January"=>"Январь","February"=>"Лютий","March"=>"Березень",
   "April"=>"Квітень","May"=>"Травень", "June"=>"Червень",
   "July"=>"Июль","August"=>"Серпень","September"=>"Вересень",
   "October"=>"Жовтень","November"=>"Листопад","December"=>"Грудень");

    $months=\Carbon\Carbon::parse($getdate)->format('F');

    $ukrnamemonth = str_replace($months, "$monthsList[$months]", $months);

         switch ($request->name) {
           case 'new':
            $insertrozklad = Rozkladz::create([
                  'user_id' => $request->user_id,
                  'bazainternatyr_id' => $request->bazainternatyr_id,
                  'otdeleniya_id' => $request->selectvid,
                  'month' =>  $month,
                  'name_month' => $ukrnamemonth,
                  'year' => $year,
                  'year_start' => $request->yearstart,
                  'dates' =>  $dates,
                  'datep' =>  $datep,
              ]);
            return response()->json('ok Оберіть інший місяць!');
             break;
  
           case 'editrozklad':

           $event = Rozkladz::find($request->id)->update([
                  'month' => $request->month,'month' =>  $month,
                  'name_month' => $ukrnamemonth, 'dates' =>  $dates,
                  'datep' =>  $datep
              ]);
           // dump($request->id);
           // exit();
           $m1=$request->baza;
 
           return view ('admink.kerivnuk.rozkladz',compact('m1'));
           break;
  
           case 'delete':
              $event = Rozkladz::find($request->id)->delete();
  
              return response()->json();
             break;
    
             
           default:
             # code...
             break;
        }

    }
  public function rozkladzint(Request $request)
  {

    $current = Auth::user()->id;

    $rozkladz = DB::select("select rozkladzs.*, m1.id, m1.surname, m1.name, m1.user_id, m2.name_baza,m2.id, m3.name_otdeleniya from rozkladzs
    
     left join (SELECT id, user_id, surname, name, startyear FROM user_profiles   where user_id='$current') as m1
      on rozkladzs.user_id=m1.user_id
     
      join (SELECT id, name_baza FROM bazainternatyrs) as m2
      on rozkladzs.bazainternatyr_id=m2.id

      join (SELECT id, name_otdeleniya FROM otdeleniyas) as m3
      on rozkladzs.otdeleniya_id=m3.id

      where rozkladzs.user_id='$current' order by year asc,month asc
      ");

    // dump($rozkladz);
    // exit();
    return view ('rozkladzaochno',compact('rozkladz'));
  }

  public function editrozkladz(Request $request)
  {

    
  $intern = DB::select("select rozkladzs.id, rozkladzs.user_id, rozkladzs.dates,  rozkladzs.otdeleniya_id, rozkladzs.bazainternatyr_id, rozkladzs.name_month, user_name.surname, user_name.name, user_name.course, user_name.user, user_name.startyear, bazainternatyr_id, baza.name_baza, otdeleniya.name_otdeleniya from rozkladzs 

   Left Join (select user_profiles.user_id as user, user_profiles.surname, name, startyear, course from user_profiles) as user_name on  rozkladzs.user_id=user_name.user 

   Left Join (select bazainternatyrs.name_baza, bazainternatyrs.id from bazainternatyrs) as baza on  rozkladzs.bazainternatyr_id=baza.id 

   Left Join (select otdeleniyas.id, otdeleniyas.name_otdeleniya from otdeleniyas) as otdeleniya on  rozkladzs.otdeleniya_id=otdeleniya.id 

   where rozkladzs.id='$request->id' ");
 
    // dump($intern);
    //  exit();
    
 return view ('admink.kerivnuk.include.brick-editrozkladzuser',compact('intern'));
    }

 }