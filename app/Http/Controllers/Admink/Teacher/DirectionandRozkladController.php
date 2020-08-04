<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class DirectionandRozkladController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $napr= DB::table('modul_hour')
     ->select('modul_hour.*')
     ->get();
   
        return view ('admink.kerivnuk.sprav_modul', compact('napr'));
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
 if   (isset($request['save1'])){
       DB::table('modul_hour')
      ->insert(['name_napravlenie'=> $data_request['name'],
        'modul'=> $data_request['modul'],
        'max_group'=> $data_request['max_group'],
        'days'=> $data_request['days'],
        'created_at'=>Carbon::now()
 ]);
}
elseif (isset($request['delete1'])){
       DB::table('modul_hour')
      ->where('id', $data_request['id'])
      ->delete();
}
elseif (isset($data_request['create1'])){
       DB::table('modul_hour')
      ->where('id', $data_request['id'])
      ->update(['name_napravlenie'=> $data_request['name'],
        'modul'=> $data_request['modul'],
        'max_group'=> $data_request['max_group'],
        'days'=> $data_request['days'],
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
