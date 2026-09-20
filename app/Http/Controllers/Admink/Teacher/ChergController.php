<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\UserProfile;
use App\ModelSeminar\TeacherName;
use App\ModelSeminar\Eventduty;

class ChergController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
      if (isset($request->month)) {
      $getdate=$request->month;
      $month=\Carbon\Carbon::parse($getdate)->format('m');
      $year=\Carbon\Carbon::parse($getdate)->format('Y');
      $eventsmonth = DB::select("select eventdutys.id, eventdutys.user_id, title, start, end, vid, m1.surname, m1.name, m2.nameshort, m3.vid_id, m4.priom_id from eventdutys
       
         left join (select user_id, surname, name from user_profiles) as m1
           ON eventdutys.user_id=m1.user_id
        
         left join (select id, namelong,nameshort from  teacher_names) as m2
           ON eventdutys.brigada_id=m2.id

         left join (select id, namelong, nameshort as vid_id from  teacher_names) as m3
           ON eventdutys.vid_id=m3.id

        left join (select id, namelong, nameshort as priom_id from  teacher_names) as m4
           ON eventdutys.priom_id=m4.id
        where month(start)='$month' and year(start)=$year
        order by eventdutys.start asc
            ");
    } else {
      $eventsmonth = '';
    }
    $intern = UserProfile::select('surname','user_id','name')->where('course', '!=', 12)->where('course', '<=', 3)->orderby('surname', 'asc')->get();

    $teacher = TeacherName::select('nameshort','id','personaly','comm','brigada')->get();

      if($request->ajax()) {
      
      $getdate=$request->month;
      $month=\Carbon\Carbon::parse($getdate)->format('m');
      $year=\Carbon\Carbon::parse($getdate)->format('Y');

      $events = DB::select("select eventdutys.id, eventdutys.user_id, title, start, end, vid, m1.surname, m1.name, m2.nameshort, m3.vid_id, m4.priom_id from eventdutys
       
         left join (select user_id, surname, name from user_profiles) as m1
           ON eventdutys.user_id=m1.user_id
        
         left join (select id, namelong,nameshort from  teacher_names) as m2
           ON eventdutys.brigada_id=m2.id

         left join (select id, namelong, nameshort as vid_id from  teacher_names) as m3
           ON eventdutys.vid_id=m3.id

        left join (select id, namelong, nameshort as priom_id from  teacher_names) as m4
           ON eventdutys.priom_id=m4.id
        where month(start)='$month' and year(start)=$year
        order by eventdutys.start asc
            ");
                   return response()->json([
                'table' => view("admink.kerivnuk.include.calendarduty", ['events' => $events])->render(),
            ]);
        }
        return view ('admink.kerivnuk.cherguvannya',compact('intern','teacher','eventsmonth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    $intern = Auth::user()->id;
    $getdate=$request->month;
    $month=\Carbon\Carbon::parse($getdate)->format('m');
    $year=\Carbon\Carbon::parse($getdate)->format('Y');
    $events= DB::select("select eventdutys.id, eventdutys.user_id, title, start, end, vid, m1.surname, m1.name, m2.nameshort, m3.vid_id, m4.priom_id from eventdutys
       
     join (select user_id, surname, name from user_profiles where user_id='$intern') as m1
        ON eventdutys.user_id=m1.user_id
        
     left join (select id, namelong,nameshort from  teacher_names) as m2
           ON eventdutys.brigada_id=m2.id

     left join (select id, namelong, nameshort as vid_id from  teacher_names) as m3
        ON eventdutys.vid_id=m3.id

     left join (select id, namelong, nameshort as priom_id from  teacher_names) as m4
      ON eventdutys.priom_id=m4.id
      
      where month(start)='$month' and year(start)=$year
        order by eventdutys.start asc
            ");
       
return view ('enentcherguvanna', compact('events'));

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ajax response
        if ($request->ajax()) {

         switch ($request->type) {
           case 'add':
              $event = Eventduty::create([
                  'title' => $request->vid,
                  'start' => $request->data,
                  'end' => $request->data,
                  'vid' => $request->vid,
                  'priom_id' => $request->priom,
                  'vid_id' => $request->vidpib,
                  'brigada_id' => $request->brigada,
                  'user_id' => $request->intern,
              ]);
            return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Eventduty::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }



           
        } 
   
                
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
