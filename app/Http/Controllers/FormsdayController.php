<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Nightworkday;
use Auth;
use App\User;
use App\Nightpractic;
use DB;
use Session;
use Carbon\Carbon;


class FormsdayController extends Controller
{
    public function Getsurgery()
    {
       
        return view('nightworkday');
    }

    public function Postsurgery(Request $request)
    {
        $currentUser = Auth::user();

        // $validateData = $request->validate([
        //     'diagnoses' => 'required',
        //     'apdate' => 'required',
        //     'fio' => 'required|max:255',
        //     'work' => 'required',
        //     'practic' => 'required',
        //     'date_arrival' => 'required',
        //     'time_arrival' => 'required',
        //     'station' => 'required|max:255'

        // ]);

        $data = $request->all();
        // dump($data);
        // exit();

$nightworkday = new Nightworkday();
$nightworkday->date_work = $request->get('date_work');
$nightworkday->baza = $request->get('baza');
$nightworkday->time_work = $request->get('time_work');
$nightworkday->station_work = $request->get('station_work');
$nightworkday->fio = $request->get('fio');
$nightworkday->diagnosespriom = $request->get('diagnosespriom');
$nightworkday->otkaz = $request->get('otkaz');
$nightworkday->gosp = $request->get('gosp');
$nightworkday->num_cardotkaz = $request->get('num_cardotkaz');
$nightworkday->prichina = $request->get('prichina');
$nightworkday->manipulaciiotkaz = $request->get('manipulaciiotkaz');
$nightworkday->type_workotkaz = $request->get('type_workotkaz');
$nightworkday->num_card = $request->get('num_card');
$nightworkday->work = $request->get('work');
$nightworkday->type_workgosp = $request->get('type_workgosp');
$nightworkday->fiostacionar = $request->get('fiostacionar');
$nightworkday->num_cardstacionar = $request->get('num_cardstacionar');
$nightworkday->diagnosesstac = $request->get('diagnosesstac');
$nightworkday->oper = $request->get('oper');
$nightworkday->type_workstac = $request->get('type_workstac');
$nightworkday->direction = $request->get('direction');
$nightworkday->id_student = $currentUser->id;
$nightworkday->save();
        return view('nightworkday');
    }

public function archiveNightday (Request $request)
{
       $currentUser = Auth::user();
      
      if (empty($request->calendars)){
      $calendars = Carbon::now()->addDays(-7);
      $calendarpo = Carbon::now();
      } else {
      $calendars = $request->calendars;
      $calendarpo = $request->calendarpo;
       }
      //берем id строки 
        $id_date=$request->id_date;
        
        $getdate = DB::table('nightworkdays')
         ->join('user_profiles', 'nightworkdays.id_student', '=', 'user_profiles.user_id' )
         ->select('nightworkdays.*', 'user_profiles.surname','user_profiles.name')
         ->where('id_student', $currentUser->id)
         ->whereBetween('nightworkdays.created_at', [$calendars, $calendarpo])->get();
        // dump($calendars);
        // exit();
  return view('archive_nightday', compact('getdate','calendars','calendarpo'));
    }

//        public function archive_nightday(Request $request)
//     {
// // dump($request);
// //     exit();
//         $currentUser = Auth::user();
//        $currentUser = Auth::user();
//       if (empty($request->calendars)){
//       $calendars = Carbon::now()->addDays(-7);
//       $calendarpo = Carbon::now();
//       } else {
//     $calendars = $request->calendars;
//     $calendarpo = $request->calendarpo;
//      }
//       //берем id строки 
//         $id_date=$request->id_date;
        
//         $getdate = DB::table('nightworkdays')
//          ->join('user_profiles', 'nightworkdays.id_student', '=', 'user_profiles.user_id' )
//          ->select('nightworkdays.*', 'user_profiles.surname','user_profiles.name')
//          ->where('id_student', $currentUser->id)
//          ->whereBetween('nightworkdays.created_at', [$calendars, $calendarpo])->get();
//         // dump($getdate);
//         // exit();
//   return view('archive_nightday', compact('getdate','calendars','calendarpo'));
//     }


    public function getnightprint(Request $request)
    {
// dump($request);
//     exit();
        $currentUser = Auth::user();
         $getdate = DB::table('nightworkdays')
         ->join('user_profiles', 'nightworkdays.id_student', '=', 'user_profiles.user_id' )
         ->select('nightworkdays.*', 'user_profiles.surname','user_profiles.name')
         ->where('id_student', $currentUser->id)
         ->get();
        // dump($getdate);
        // exit();
  return view('archive_nightday_print',compact('currentUser','getdate'));
    }

}
