<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class TeacherandWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
   $teacher = DB::table('teacher_names')
   ->select('teacher_names.*')
   ->orderby('teacher_names.namelong', 'asc')
   ->get();
   
   $napr= $baza = DB::table('modul_hour')
   ->select('modul_hour.*')
   ->get();

   $dostypnost = DB::table('teacher_names')
   ->leftjoin('hour_fio', 'teacher_names.id', '=', 'hour_fio.teacher_id' )
   ->leftjoin('modul_hour', 'hour_fio.id_direction', '=', 'modul_hour.id' )
   ->select('teacher_names.position', 'teacher_names.namelong','teacher_names.nameshort','hour_fio.id_direction','hour_fio.id as id_teacher','modul_hour.name_napravlenie','modul_hour.id as id_direction')
   ->orderby('teacher_names.nameshort', 'asc')
   ->get();
   
  return view ('admink.kerivnuk.sprav_teacher', compact('teacher', 'napr','dostypnost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request);
        // exit();
        $data_request=$request->all();

        // $str=strpos($row, "-");
        // $row=substr($row, 0, $str);
 if (isset($data_request['save'])){
       DB::table('teacher_names')
      ->insert(['namelong'=> $data_request['namelong'],
        'nameshort'=> $data_request['nameshort'],
        'position'=> $data_request['position'],
        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($data_request['create'])){
      DB::table('teacher_names')
     ->where('id', $data_request['id_teacher'])
     ->update(['namelong'=> $data_request['namelong'],
        'nameshort'=> $data_request['nameshort'],
        'position'=> $data_request['position'],
        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($request['delete'])){
      DB::table('teacher_names')
     ->where('id', $data_request['id_teacher'])
      ->delete();
}
elseif (isset($request['save1'])){
      DB::table('hour_fio')
      ->insert(['teacher_id'=> $data_request['nameshort'],
        'id_direction'=> $data_request['direction'],
        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($data_request['create1'])){
      DB::table('hour_fio')
      ->where('id', $data_request['id'])
      ->update(['id_direction'=> $data_request['direction'],
        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($request['delete1'])){
       DB::table('hour_fio')
      ->where('id', $data_request['id'])
      ->delete();
}
   return back();
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
