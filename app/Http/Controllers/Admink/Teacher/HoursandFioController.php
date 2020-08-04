<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class HoursandFioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   $baza_otd = DB::table('baza_internatyr')
      ->select('baza_internatyr.*')
   ->get();

   $baza = DB::table('baza_internatyr')
     ->leftjoin('otdeleniya', 'baza_internatyr.id', '=', 'otdeleniya.id_baza' )
     ->leftjoin('modul_hour', 'otdeleniya.id_napravlenie', '=', 'modul_hour.id' )
      ->select('baza_internatyr.*', 'otdeleniya.name_otdeleniya','modul_hour.name_napravlenie','modul_hour.id as id_direction','otdeleniya.id as id_otdelenie')
   ->get();
 $baza1 = array();
  foreach ($baza as $l) {
 $baza1[$l->id]['name_baza'] = $l->name_baza;
 $baza1[$l->id]['name_town'] = $l->name_town;
 $baza1[$l->id]['name_otdeleniya'][] = $l->name_otdeleniya;
 $baza1[$l->id]['id'] = $l->id;
 $baza1[$l->id]['id_otdelenie'][] = $l->id_otdelenie;
 $baza1[$l->id]['name_napravlenie'][] = $l->name_napravlenie;
 $baza1[$l->id]['id_direction'][] = $l->id_direction;
 }
   // dump($baza1);
   // exit(); 
$napr= DB::table('modul_hour')
   ->select('modul_hour.*')
   ->get();

  return view ('admink.kerivnuk.sprav_hoursandfio', compact('baza1','napr','baza_otd'));
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
 if (isset($data_request['create'])){
       DB::table('baza_internatyr')
      ->where('id', $data_request['id'])
      ->update(['name_baza'=> $data_request['name_baza'],
        'name_town'=> $data_request['name_town'],
        'created_at'=>Carbon::now()
 ]);
}

elseif (isset($request['delete'])){
       DB::table('baza_internatyr')
      ->where('id', $data_request['id'])
      ->delete();
}

elseif (isset($request['save'])){
       DB::table('baza_internatyr')
      ->insert(['name_baza'=> $data_request['name_baza'],
        'name_town'=> $data_request['name_town'],
        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($data_request['create1'])){
       DB::table('otdeleniya')
      ->where('id', $data_request['id_otdelenie'])
      ->update(['id_baza'=> $data_request['id_baza'],
        'name_otdeleniya'=> $data_request['name_otdeleniya'],
        'id_napravlenie'=> $data_request['direction'],

        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($request['delete1'])){
      DB::table('otdeleniya')
      ->where('id', $data_request['id_otdelenie'])
      ->delete();
}
elseif (isset($request['save1'])){
       DB::table('otdeleniya')
      ->insert(['id_baza'=> $data_request['name_baza'],
        'name_otdeleniya'=> $data_request['name_otdeleniya'],
        'id_napravlenie'=> $data_request['direction'],
        'created_at'=>Carbon::now()
 ]);
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
