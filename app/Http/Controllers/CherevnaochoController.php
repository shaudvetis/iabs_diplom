<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	public function getCherevna(Inputformsday $inputformsday, Formssurgeryday $formssurgeryday, Formspracticeday $formspracticeday) {


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
    return view('cherevnaocho',compact('forms','formssurgeryday','nightworkday','nightpractic'))->with('formspracticeday', $formspracticeday);
}
		
	 	public function postCherevna (Request $request)
	{
    $today = new \DateTimeImmutable();
$daysInMonth = (int)$today->format('t');
$day = new \DateTimeImmutable('first day of this month');
$calendar = [];
for ($i = 1; $i <= $daysInMonth; $i++){
    $calendar[$i]['weekday'] = $day->format('w');
    if ($day->format('d') == $today->format('d')){
        $calendar[$i]['today'] = true;
    }
    $day = $day->add(new \DateInterval('P1D'));
}
  }
	
	}
	
