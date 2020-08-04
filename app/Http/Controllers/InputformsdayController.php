<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inputformsday;
use Auth;
use App\User;
use DB;
use Session;
use Carbon\Carbon;


class InputformsdayController extends Controller
{
    public function Formindex(Request $request)
    {
        $ws = DB::select("select icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where gr2='' and gr3='' order by ur1, gr1,gr2, gr3 "); 
   
            $ws1 = DB::select("select icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where gr2!='' and gr3='' order by ur1, gr1,gr2, gr3 ");
            
             $ws2 = DB::select("select icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where gr2!='' and gr3!='' order by ur1, gr1,gr2, gr3 "); 
       
        return view('inputformsday',compact('ws','ws1','ws2'));
    }

    public function postAction(Request $request)
    {
        //  dump($request);
        // exit();

        $currentUser = Auth::user();

        //$validateData = $request->validate([
       // // //     'fio'=>'bail|required|max:255',
        //     'direction' => 'required',
        // //     'num_card' => 'required|:unique:inputforms',
        // //     'apdate' => 'required'
        //       ]);
        $data = $request->all();
        $inputFormsday = new Inputformsday();
        $inputFormsday->fio = $request->get('fio');
        $inputFormsday->diagnoses = $request->get('diagnoses');
        // $inputFormsday->mkb = $request->get('mkb');
        $inputFormsday->num_card = $request->get('num_card');
        $inputFormsday->apdate = $request->get('apdate');
        $inputFormsday->apdate_end = $request->get('apdate_end');
        $inputFormsday->comm = $request->get('comm');
        $inputFormsday->direction = $request->get('direction');
        $inputFormsday->type_work = $request->get('type_work');
        $inputFormsday->oper = $request->get('oper');
        $inputFormsday->id_student = $currentUser->id;
        $inputFormsday->save();
  \Session::flash('flash_message', 'Дякуємо! Дані успішно записані');
 if(!Empty($inputFormsday)){
    return back()->with('message-updated', __('Запис успішно відредагований...'));
}
     else {
       
  return back()->with('message-updated', __('Запис не відредагований...'));
  }

    }

    public function getInputDay(Request $request)
{
    //Архив отображение
       $currentUser = Auth::user();
      if (empty($request->calendars)){
      $calendars = Carbon::now()->addDays(-7);
      $calendarpo = Carbon::now();
      } else {
      $calendars = $request->calendars;
      $calendarpo = $request->calendarpo;
      }
        $getdate = DB::table('inputformsdays')
         ->join('napravlenias', 'inputformsdays.direction', '=', 'napravlenias.id' )
         ->join('user_profiles', 'inputformsdays.id_student', '=', 'user_profiles.user_id' )
         ->select('inputformsdays.*', 'napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('id_student', $currentUser->id)
         ->where('apdate','>', Carbon::now()->addDays(-7))->get();

        return view('archive_inputday',compact('getdate','calendars','calendarpo'));
}
      public function postArchivinput(Request $request)
    {
// dump($request);
//     exit();
//Архив курации запись данных по дате конца курации
      
        $currentUser = Auth::user();
         if (empty($request->calendars)){
      $calendars = Carbon::now()->addDays(-60);
      $calendarpo = Carbon::now();
      } else {
      $calendars = $request->calendars;
      $calendarpo = $request->calendarpo;
      }
      //берем id строки 
        $id_date=$request->id_date;
        $inputFormsday = Inputformsday::where('id','=',$id_date)
         ->update(['apdate_end' => $request->apdate_end,'diagnoses' => $request->diagnoses]);
        
        $getdate = DB::table('inputformsdays')
         ->join('napravlenias', 'inputformsdays.direction', '=', 'napravlenias.id' )
         ->join('user_profiles', 'inputformsdays.id_student', '=', 'user_profiles.user_id' )
         ->select('inputformsdays.*', 'napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('id_student', $currentUser->id)
         ->whereBetween('apdate', [$calendars, $calendarpo])->get();
        // dump($getdate);
        // exit();
  return view('archive_inputday', compact('getdate','calendars','calendarpo'));
    }

     public function getInputprint()
        {
      
       $currentUser = Auth::user();

        $getdate = DB::table('inputformsdays')
         ->join('napravlenias', 'inputformsdays.direction', '=', 'napravlenias.id' )
         ->join('user_profiles', 'inputformsdays.id_student', '=', 'user_profiles.user_id' )
         ->select('inputformsdays.*', 'napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('inputformsdays.id_student', $currentUser->id)
         ->where('inputformsdays.fio', 'очна')
         ->orwhere('inputformsdays.fio', ' очна')
         ->get();
  //     dump($getdate);
  // exit();
          $getdateoch = DB::table('inputformsdays')
         ->join('napravlenias', 'inputformsdays.direction', '=', 'napravlenias.id' )
         ->join('user_profiles', 'inputformsdays.id_student', '=', 'user_profiles.user_id' )
         ->select('inputformsdays.*', 'napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('id_student', $currentUser->id)
         ->where('fio', 'заочна')
         ->orwhere('inputformsdays.fio', ' заочна')
         ->get();
                 return view('archive_input_print',compact('getdate','getdateoch','currentUser'));
}

 public function modalget()
    {
//    var_dump($_GET);
// exit();
    if(isset($_GET['class1'])) 
    $class1 = $_GET['class1'];


$mkb = '';
   if(isset($_GET['mkb'])) 
    $mkb = $_GET['mkb'];



 $ys = DB::select("select icd_diagnoses.namedia,icd_diagnoses.code, icd_diagnoses.gr3 from icd_diagnoses where gr3='$class1' ");
// var_dump($ys);
// exit();
  

//           var_dump($mkb);
// exit();

        return view('modal',compact('ys','mkb'));
    }

     public function modalmkb()
    {
//    var_dump($_GET);
// exit();
//           $mkb = '';
//       if(isset($_GET['mkb'])) 
//     $mkb = $_GET['mkb'];

  

//           var_dump($mkb);
// exit();
 return response($mkb);
    }
}
