<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelTeacher\Testirovanie;
use DB;
use App\UserProfile;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
       $a = $request->course;
       $b = $request->decatki;
       $d = $request->direction;
     $direction = DB::table('napravlenias')
       ->select('napravlenias.id', 'napravlenias.direction')
               ->get(); 
         // dump($request);
         // exit();
       $student = DB::table('user_profiles')
       ->leftjoin('testirovanies', function($join) use ($d){
        $join->on('user_profiles.user_id', '=', 'testirovanies.user_id' )
        ->where('direction',$d);
          })
       ->select('user_profiles.user_id', 'user_profiles.surname','user_profiles.name','testirovanies.all_bal','testirovanies.proc1','testirovanies.proc2','testirovanies.proc3', 'testirovanies.all_bal','testirovanies.proc4','testirovanies.direction' )
       ->where('course',$a)
       ->where('decatki', $b)
       ->orderby('user_profiles.surname')
       ->get();
        // dump($student);
        // exit();
        return view('admink.test',compact('direction','a','b','d','student'));
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
       $data_insert = array();
        foreach ($data_request as $key1 => $value1) {
         if($key1 != '_token' && $key1 != 'sub')
          foreach($value1 as $key2 => $value2) { 
           $data_insert[$key2][$key1] = $value2;
         }
    }
    // dump($data_insert);
    //     exit();
    foreach ($data_insert as $key => $value3) {
        $data_user = $value3['user_id'];
        $direct = $value3['direction'];
        $ball = $value3['bal1']+$value3['bal2']+$value3['bal3']+$value3['bal4'];
        //    dump($ball);
        // exit();
        $zapros = Testirovanie::where('user_id','=',$data_user)->where('direction',$direct)->first();
        // dump($zapros);
       //  exit();
     if (is_null($zapros)) 
     {
     $zapros=Testirovanie::updateOrCreate(['user_id'=>$data_user, 'direction'=>
     $value3['direction'],'proc1'=>$value3['proc1'],'proc2'=>$value3['proc2'],'proc3'=>$value3['proc3'],'proc4'=>$value3['proc4'],'all_bal'=>$ball]);
     }
    else{   
    $zapros = Testirovanie::where('user_id','=',$data_user)->where('direction',$direct)->update(['user_id'=>$data_user, 'direction'=>$value3['direction'],'proc1'=>$value3['proc1'],'proc2'=>$value3['proc2'],'proc3'=>$value3['proc3'],'proc4'=>$value3['proc4'],'all_bal'=>$ball]);
            }
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
