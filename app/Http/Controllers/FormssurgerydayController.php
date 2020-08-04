<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formssurgeryday;
use Auth;
use DB;
use App\User;



class FormssurgerydayController extends Controller
{
	public function Formindex(Request $request) {

	$napravlenie = DB::table('napravlenias')
  ->select('napravlenias.id', 'napravlenias.direction')
   ->get(); 

$i=$request->all();
$d = $request->direction;

$currentUser = Auth::user();
// dd($currentUser->id);
// exit();
$seminarse = DB::table('seminar_temas')
 ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
 ->leftjoin('ocenki_tables', function($join) use ($currentUser){
                $join->on('seminar_temas.id', '=', 'ocenki_tables.tema')
                     ->where('ocenki_tables.user_id', $currentUser->id);
            })
->select('ocenki_tables.id','seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp', 'seminar_temas.pract_nav', 'seminarus.direction','seminar_temas.element', 'ocenki_tables.bal', 'ocenki_tables.lessons', 'ocenki_tables.morning')
 ->where('seminarus.direction', $d);

$seminar = DB::table('seminarus')
->select('id as ocenki_id', 'id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main', 'pract_nav', 'direction','element','bal', 'kafedra as lessons', 'teor_nav as morning')
 ->where('seminarus.direction', $d)
   ->union($seminarse)
    ->orderBy('id_seminar')
->orderBy('npp')
->get();
// dd($seminar);
// exit();
$results1=DB::select("select  user_profiles.user_id, user_profiles.surname, user_profiles.name, user_profiles.decatki,  mocenki.suma, mocenki1.suma1,mocenki2.suma3  FROM user_profiles

left join (select controlmodyls.user_id, controlmodyls.id_seminarus, sum(COALESCE(controlmodyls.one,0)
 + COALESCE(controlmodyls.two,0)
 + COALESCE(controlmodyls.three,0)
 + COALESCE(controlmodyls.four, 0)
 + COALESCE(controlmodyls.five, 0)
 + COALESCE(controlmodyls.six, 0)
 + COALESCE(controlmodyls.seven,0)
 + COALESCE(controlmodyls.eight,0)
 + COALESCE(controlmodyls.nine, 0)) as suma from controlmodyls where controlmodyls.id_seminarus='$d' group by controlmodyls.id_seminarus, controlmodyls.user_id) as mocenki
 ON  user_profiles.user_id = mocenki.user_id 

left join (select   ocenki_tables.user_id, sum(ocenki_tables.bal) as suma1 from ocenki_tables where ocenki_tables.id_seminarus='$d' group by ocenki_tables.user_id ) as mocenki1 
ON  user_profiles.user_id = mocenki1.user_id 

left join (select   testirovanies.user_id, sum(testirovanies.all_bal) as suma3 from testirovanies where testirovanies.direction=2 group by testirovanies.user_id ) as mocenki2 
ON  user_profiles.user_id = mocenki2.user_id 

where user_profiles.user_id ='$currentUser->id' ");
// dd($results1);
// exit();

 $direction = DB::table('napravlenias')
 ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
  ->select('napravlenias.id', 'napravlenias.direction','settings_bal.*' )
            ->where('napravlenias.id', $d)
            ->get(); 
//             dd($direction);
// exit();
	 return view('formssurgeryday',compact('direction','d','napravlenie','seminar','results1','currentUser'));
	}

	public function postAction(Request $request)
	{

		$currentUser = Auth::user();
		

		// $validateData = $request->validate([
		// 	'viewsurgery'=>'required',
		// 	'num_card'=>'required|:unique:formssurgery',
		// 	'type_work'=>'required'
		// ]);

			
		$data=$request->all();

		$formssurgeryday = new Formssurgeryday();

		$formssurgeryday->viewsurgery = $request->get('viewsurgery');
	    $formssurgeryday->direction = $request->get('direction');
		$formssurgeryday->num_card = $request->get('num_card');
		$formssurgeryday->type_work = $request->get('type_work');
		$formssurgeryday->apdate = $request->get('apdate');
		$formssurgeryday->num_surgery = $request->get('num_surgery');
		$formssurgeryday->id_student = $currentUser->id;

		$formssurgeryday->save();
		return view('formssurgeryday');
	}


		public function archiveSargeryday ()
		{

	
	
		// Get current auth user-student
		$student = Auth::user();

		// If current auth user not set - abort - page 404
		if (!$student) {
			abort(404);
		}

		// Get all inputforns from DB with student_id == current student id
		$forms = Formssurgeryday::where('id_student', $student->id)->get();
		
		// Add to each form object his user object in user field
		foreach ($forms as &$form) {
			$form->user = User::find($student->id);
		}

		// Add data to data array for view
		$this->data['formssurgeryday'] = $forms;
		$this->data['student'] = $student;

		// Render view
		return view('archive_surgeryday', $this->data);
		}
}



	
