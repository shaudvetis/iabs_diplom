<?php

namespace App\Http\Controllers\Napravlenia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class GnoynayaController extends Controller
{
	public function indexGnoynaya()
     {
    	$seminarse = DB::table('seminar_temas')
 ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminarus.bal', 'seminar_temas.pract_nav', 'seminar_temas.teor_nav')
 ->where('seminarus.direction', '7');



$seminar = DB::table('seminarus')
->select('id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main', 'bal', 'pract_nav', 'teor_nav')
 ->where('seminarus.direction', '7')
   ->union($seminarse)
    ->orderBy('id_seminar',   'asc')
->get();


      $currentUser = Auth::user();
      $forms = Inputformsday::where('id_student', $currentUser->id)
      ->Where('direction', 'Гнійна хірургія')
      ->get();

     // Add to each form object his user object in user field
      foreach ($forms as &$form) {
      $form->user = User::find($currentUser->id);
      }

//dd($form);

    $formssurgeryday = Formssurgeryday::where('id_student', $currentUser->id)
    ->Where('direction', 'Гнійна хірургія')
    ->get();
    foreach ($formssurgeryday as &$surgery) {
      $surgery->user = User::find($currentUser->id);
    }


    $formspracticeday = Formspracticeday::where('id_student', $currentUser->id)
     ->Where('direction', 'Гнійна хірургія')
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
    	return view('napravlenia.gnoynaya', compact('forms', 'formssurgeryday', 'formspracticeday', 'seminar'));
    }
}
