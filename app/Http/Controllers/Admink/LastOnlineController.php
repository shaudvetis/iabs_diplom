<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Auth;
use Session;

class LastOnlineController extends Controller
{
   public function getonline(Request $request)
   {
 
$c = $request->course;
    
$latestPosts = DB::table('last_onlines')
   ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
   ->groupBy('user_id');


$kyraciya=DB::table('inputformsdays as s')
  ->select('s.id_student','s.direction as dir_kyracia','s.created_at as date_kyracia','c.name_color as color_kyr')
  ->leftJoin('inputformsdays as s1', function ($join) {
        $join->on('s.id_student', '=', 's1.id_student');
        $join->on('s.created_at', '<', 's1.created_at');
   })
   ->Join('color_directions as c', function ($join) {
        $join->on('c.num_napravlenie', '=', 's.direction');
  })
  ->whereNull('s1.id_student')
   ->whereNotNull('s.created_at');
//   dump($rg);
// exit();

$night = DB::table('nightworkdays as n')
  ->select('n.id_student','n.direction as dir_night','n.created_at as date_night')
  ->leftJoin('nightworkdays as n1', function ($join) {
        $join->on('n.id_student', '=', 'n1.id_student');
        $join->on('n.created_at', '<', 'n1.created_at');
   })
  
  ->whereNull('n1.id_student')
  ->whereNotNull('n.created_at');

//   dump($night);
// exit();
                 
$practic = DB::table('formspracticedays as f')
  ->select('f.id_student','f.direction as dir_practic','f.created_at as date_practic','c.name_color as color_practic')
  ->leftJoin('formspracticedays as f1', function ($join) {
        $join->on('f.id_student', '=', 'f1.id_student');
        $join->on('f.created_at', '<', 'f1.created_at');
   })
   ->leftJoin('color_directions as c', function ($join) {
        $join->on('c.num_napravlenie', '=', 'f.direction');
  })
  ->whereNull('f1.id_student')
   ->whereNotNull('f.created_at');
//   dump($practic);
// exit();
 
$literatyra = DB::table('literatyres as l')
  ->select('l.user_id','l.direction as dir_literatyre','l.created_at as date_literatyre','c.name_color as color_lit')
  ->leftJoin('literatyres as l1', function ($join) {
        $join->on('l.user_id', '=', 'l1.user_id');
        $join->on('l.created_at', '<', 'l1.created_at');
   })
  ->Join('color_directions as c', function ($join) {
        $join->on('c.num_napravlenie', '=', 'l.direction');
  })
  ->whereNull('l1.user_id')
  ->whereNotNull('l.created_at');
//      dump($literatyra);
// exit();

$intern = DB::table('user_profiles')
->leftjoinSub($latestPosts, 'last_onlines', function ($join) {
            $join->on('user_profiles.user_id', '=', 'last_onlines.user_id');
})
->leftjoinSub($kyraciya, 'inputformsdays', function ($join) {
$join->on('inputformsdays.id_student', '=', 'user_profiles.user_id');
})
->leftjoinSub($night, 'nightworkdays', function ($join) {
            $join->on('nightworkdays.id_student', '=', 'user_profiles.user_id');
})
->leftjoinSub($practic, 'formspracticedays', function ($join) {
$join->on('formspracticedays.id_student', '=', 'user_profiles.user_id');
})
->leftjoinSub($literatyra, 'literatyres', function ($join) {
           $join->on('literatyres.user_id', '=', 'user_profiles.user_id');
})
->select('user_profiles.user_id','user_profiles.surname','user_profiles.name','last_post_created_at','dir_kyracia','date_kyracia','color_kyr','dir_night','date_night','date_practic','dir_practic','color_practic','dir_literatyre','date_literatyre','color_lit')
   ->where('user_profiles.course', $c)
   ->orderby('user_profiles.surname', 'asc')
   ->get();
// dump($intern);
// exit();

    return view ('admink.last_online', compact('c','intern'));
}


}
