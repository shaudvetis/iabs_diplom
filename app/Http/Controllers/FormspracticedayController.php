<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formspracticeday;

use Auth;
use App\User;
use DB;
use Session;
use Carbon\Carbon;

class FormspracticedayController extends Controller
{
	public function Practicegetsurgery() {

	 return view('formspracticeday');
	}
	public function Practicesurgery (Request $request)
	{
// dump($request);
// exit();
		$currentUser = Auth::user();

		// $validateData = $request->validate([
		// 	'get_skills'=>'required',
		// 	'sum_number'=>'required'
     	// ]);
		$data=$request->all();
		$formspracticeday = new Formspracticeday();
		$formspracticeday->get_skills = $request->get('get_skills');
		$formspracticeday->sum_number = $request->get('sum_number');
		$formspracticeday->baza = $request->get('fio');
		$formspracticeday->pract_cherevna = $request->get('pract_cherevna');
		$formspracticeday->pract_grudna = $request->get('pract_grudna');
		$formspracticeday->pract_proct = $request->get('pract_proct');
		$formspracticeday->pract_urolog = $request->get('pract_urolog');
		$formspracticeday->pract_vascular = $request->get('pract_vascular');
		$formspracticeday->pract_gnoynaya = $request->get('pract_gnoynaya');
		$formspracticeday->pract_opiku = $request->get('pract_opiku');
		$formspracticeday->pract_kardio = $request->get('pract_kardio');
		$formspracticeday->direction = $request->get('direction');
		$formspracticeday->id_student = $currentUser->id;
		$formspracticeday->save();
		return view('formspracticeday');
	}

	public function practiceday (Request $request)
	{
		// dump($request);
		// exit();
 		// Get current auth user-student
	  $currentUser = Auth::user();
	  if (empty($request->calendars)){
	  $calendars = Carbon::now()->addDays(-7);
      $calendarpo = Carbon::now();
      } else {
  	$calendars = $request->calendars;
    $calendarpo = $request->calendarpo;
     }
		// If current auth user not set - abort - page 404
		if (!$currentUser) {
			abort(404);
		}
         $getdate = DB::table('formspracticedays')
         ->join('user_profiles', 'formspracticedays.id_student', '=', 'user_profiles.user_id' )
         ->join('napravlenias', 'formspracticedays.direction', '=', 'napravlenias.id' )
         ->select('formspracticedays.*', 'napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('id_student', $currentUser->id)
         ->whereBetween('formspracticedays.created_at', [$calendars, $calendarpo])->get();
         // ->where('formspracticedays.created_at','>', Carbon::now()->addDays(-7))->get();
		// Get all inputforns from DB with student_id == current student id
		// 	dump($getdate);
		// exit();

		return view('archiva_practiceday', compact('getdate'));
		
	}
}