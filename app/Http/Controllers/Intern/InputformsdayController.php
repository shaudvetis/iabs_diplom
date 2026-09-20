<?php

namespace App\Http\Controllers\Intern;

use Illuminate\Http\Request;

use App\ {
    Http\Controllers\Controller,
    Repositories\InternRepository,
    ModelIntern\Inputformsday,
    ModelIntern\Napravlenia,
    User
};
use Auth;
use DB;
use Session;
use Carbon\Carbon;
use App\UserProfile;


class InputformsdayController extends Controller

// Запуск страницы заполнения курации
{  
   public function __construct(InternRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
    }

  public function Formindex(Request $request)
    {
      
       $ws = $this->repository->inputformsday($request); 
      $direction =Napravlenia::select('id', 'direction')->where('views', '=', '1')->orderBy('direction','asc')->get();
      $userCourse = UserProfile::select('course','user_id')->where('user_id',  Auth::user()->id)->first();
      
       return view('intern.inputformsday',compact('ws','direction','userCourse'));
    }

// Запуск страницы записи заполненной курации

    public function postAction(Request $request)
    {

        $validateData = $request->validate([
        'fio'=>'bail|required|max:255',
        'direction' => 'required',
        'num_card' => 'nullable',
        'com'=>'nullable',
        'namemkb'=>'nullable',
        'apdate' => 'required',
        'type_work'=> 'nullable',
        'oper'=>'nullable'
        ]);
        
   $currentUser = Auth::user();
   
   $inputFormsday = $this->repository->postinputforms($request, $currentUser);
   
    \Session::flash('flash_message', 'Дякуємо! Дані успішно записані');
  if(!Empty($inputFormsday)){
  return back()->with('message-updated', __('Запис успішно відредагований...'));
}
  else {
  return back()->with('message-updated', __('Запис не відредагований...'));
  }

}


  // Запуск страницы архива курации
    public function getInputDay(Request $request)
{
  //Если не выбрали дату. а просто выбрали направление
      $currentUser = Auth::user();
     
     if (!empty($request->calendarpers and $request->calendarperpo)){
      $calendars = $request->calendarpers;
      $calendarpo =$request->calendarperpo;
      }
   //Если не выбрали дату. 
      if (empty($request->calendars and $request->calendarpo)){
      $calendars = Carbon::now()->addDays(-60);
      $calendarpo = Carbon::now()->addDays(+10);
      } 
      if (empty($request->calendarpers) and (!empty($request->calendars))) {
  //Если выбрали фильтр. 
      $calendars = $request->calendars;
      $calendarpo = Carbon::parse($request->calendarpo)->addDays(+10);
      }
//dd($calendars, $calendarpo);

   $result = $this->repository->getarchivinput($request,$calendars, $calendarpo,$currentUser);

   $napr=$request->direction;
  
// dd($calendars, $calendarpo);

  return view('intern.archive_inputday', compact('result','calendars','calendarpo', 'napr'));
}
      
      public function postArchivinput(Request $request)
    {
//Архив курации корректировка запись данных по дате конца курации
//берем id строки 
      $result = $this->repository->updatearchivinput($request);
      
      if($result==1){
         return back()->with('message-updated', __('Запис успішно відредагований...'));
      }
else {
   return back()->with('message-updated', __('Запис не збережено! Щос пішло не так!!'));
  }

}

//Работа аджакс формы по поиску МКБ
     public function modalmkb(Request $request)
    {
      if (isset($request->ur1)) {
        $ws1 = DB::select("select icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where ur1='$request->ur1' and gr3='' and gr2 !='' order by ur1, gr1,gr2, gr3 ");
        
         // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("layouts.mkbur2", ['ws1' => $ws1])->render(),
            ]);
        } 
}
if (isset($request->ur2)) {
         $ws2 = DB::select("select icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where gr2='$request->ur2' and gr3 !='' order by ur1, gr1,gr2, gr3 "); 
        
         // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("layouts.mkbur3", ['ws2' => $ws2])->render(),
            ]);
        } 
}
if (isset($request->ur3)) {
$ys = DB::select("select icd_diagnoses.namedia,icd_diagnoses.code, icd_diagnoses.gr3 from icd_diagnoses where gr3='$request->ur3' ");
   if ($request->ajax()) {
            return response()->json([
                'table' => view("layouts.modal", ['ys' => $ys])->render(),
            ]);
        } 
      }
if (isset($request->namemkb)) {
$namemkb = DB::select("select icd_diagnoses.namedia,icd_diagnoses.code, icd_diagnoses.gr3 from icd_diagnoses where namedia LIKE '%$request->namemkb%'  ");
   if ($request->ajax()) {
            return response()->json([
                'table' => view("layouts.mkbsearch", ['namemkb' => $namemkb])->render(),
            ]);
        } 
      }

    }

    
}
