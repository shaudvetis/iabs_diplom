<?php

namespace App\Http\Controllers\intern;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Literatyre;
use App\User;
use DB;
use Session;
use Carbon\Carbon;

use Auth;

class ReadController extends Controller
{
    public function getLiteratyre()
    {
return view('intern.read_literatyre');
}

public function postLiteratyre(Request $request)
	{
// dump($request);
// exit();
		$currentUser = Auth::user();
		

		$validateData = $request->validate([
			'literatyre'=>'required',
			'direction'=>'required',
			'baza'=>'required',
	
		]);

			
		$data=$request->all();

		$readliteratyre = new Literatyre();

		$readliteratyre->literatyre = $request->get('literatyre');
		$readliteratyre->direction = $request->get('direction');
		$readliteratyre->baza = $request->get('baza');
		$readliteratyre->user_id = $currentUser->id;

		$readliteratyre->save();
		return view('intern.read_literatyre');
	}

public function getArchiv(Request $request) {

// 	dump($request);
// exit();

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
         $getdate = DB::table('literatyres')
         ->join('user_profiles', 'literatyres.user_id', '=', 'user_profiles.user_id' )
         ->join('napravlenias', 'literatyres.direction', '=', 'napravlenias.id' )
         ->select('literatyres.*', 'napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('user_profiles.user_id', $currentUser->id)
         ->whereBetween('literatyres.created_at', [$calendars, $calendarpo])->get();

				// Render view
		return view('intern.archiv_literatyre', compact('getdate'));
}



}
