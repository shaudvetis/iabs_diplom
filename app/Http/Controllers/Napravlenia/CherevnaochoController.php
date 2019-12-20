<?php

namespace App\Http\Controllers\Napravlenia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Intern\Napravlenia;
use App\Intern\SeminarTema;
use App\Intern\Seminaru;
use App\Inputformsday;
use Auth;
use App\User;
use App\Formssurgeryday;
use App\Formspracticeday;
use App\Nightworkday;
use App\Nightpractic;
use DB;


class CherevnaochoController extends Controller
{
	public function getCherevna(Inputformsday $inputformsday, Formssurgeryday $formssurgeryday, Formspracticeday $formspracticeday, Request $request) {

$seminarse = DB::table('seminar_temas')
 ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav', 'seminar_temas.teor_nav','seminar_temas.element')
 ->where('seminarus.direction', '2');



$seminar = DB::table('seminarus')
->select('id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main','pract_nav', 'teor_nav', 'element')
 ->where('seminarus.direction', '2')
   ->union($seminarse)
      ->orderBy('id_seminar',   'asc')
->get();



 $currentUser = Auth::user();

$forms = Inputformsday::where('id_student', $currentUser->id)
  ->Where('direction', 'Черевна порожнина')
  ->get();

  // Add to each form object his user object in user field
    foreach ($forms as &$form) {
      $form->user = User::find($currentUser->id);
    }

//dd($form);

    $formssurgeryday = Formssurgeryday::where('id_student', $currentUser->id)
    ->Where('direction', 'Черевна порожнина')
    ->get();
    foreach ($formssurgeryday as &$surgery) {
      $surgery->user = User::find($currentUser->id);
    }


    $formspracticeday = Formspracticeday::where('id_student', $currentUser->id)
     ->Where('direction', 'Черевна порожнина')
    ->get();
    foreach ($formspracticeday as &$formspractic) {
      $formspractic->user = User::find($currentUser->id);
 }

  $nightworkday = Nightworkday::where('id_student', $currentUser->id)->get();
    foreach ($nightworkday as &$nightwork) {
      $nightwork->user = User::find($currentUser->id);
 }

$nightpractic = Nightpractic::where('id_student', $currentUser->id)->get();
    foreach ($nightpractic as &$nightpract) {
      $nightpract->user = User::find($currentUser->id);
 }
   
//dump($formspracticeday);
        // Render view
    return view('napravlenia.cherevnaocho',compact('forms','formssurgeryday','nightworkday','nightpractic', 'seminar'))->with('formspracticeday', $formspracticeday);
}
		
	 	  
	public function postCherevna(Inputformsday $inputformsday, Formssurgeryday $formssurgeryday, Formspracticeday $formspracticeday, Request $request) {


$currentUser = Auth::user();

$forms = Inputformsday::where('id_student', $currentUser->id)
  ->Where('direction', 'Черевна порожнина');
  if($request->calendar_start && $request->calendar_end) 
    $forms = $forms->where('apdate', '>=',
     substr($request->calendar_start,3,2).'-'.substr($request->calendar_start,0,2))
  ->where('apdate', '<=',substr($request->calendar_end,6).'-'.substr($request->calendat_end,3,2).'-'.substr($request->calendat_end,0,2))
  ->get();
  // Add to each form object his user object in user field
    foreach ($forms as &$form) {
      $form->user = User::find($currentUser->id);
    }


  dump($forms);





 
  }


	}
	
