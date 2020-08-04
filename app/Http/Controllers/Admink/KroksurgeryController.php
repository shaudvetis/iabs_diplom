<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\UserProfile;
use App\ModelAdmink\KrokAnest;
use App\ModelAdmink\KrokSurgery;


class KroksurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $c = $request->course;
       $d = $request->decatki;
       $k = $request->kafedra;

       $intern =  DB::table('user_profiles')
        ->leftjoin('krok_surgeries', 'krok_surgeries.user_id','=','user_profiles.user_id')
       ->select('krok_surgeries.*','user_profiles.user_id', 'user_profiles.surname', 'user_profiles.name', 'user_profiles.course', 'user_profiles.decatki')
       ->where('course', $c)
       ->where('decatki', $d)
       ->orderBy('user_profiles.surname')
               ->get(); 

        $internsa =  DB::table('user_profiles')
        ->leftjoin('krok_anests', 'krok_anests.user_id','=','user_profiles.user_id')
       ->select('krok_anests.*','user_profiles.user_id', 'user_profiles.surname', 'user_profiles.name', 'user_profiles.course', 'user_profiles.decatki')
       ->where('course', $c)
       ->where('decatki', $d)
       ->orderBy('user_profiles.surname')
               ->get(); 


        return view('admink.kroksurgery',compact('c','d','k','intern','internsa'));
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
        $data_request=$request->all();
    //         dump($data_request);
    // exit();
        $data_insert = array();
    foreach ($data_request as $key1 => $value1) {
         if($key1 != '_token' && $key1 != 'sub')
            foreach($value1 as $key2 => $value2) { 
            $data_insert[$key2][$key1] = $value2;
        }
    }
    //             dump($data_insert);
    // exit();
$krok_user = collect();
    foreach ($data_insert as $key => $value3) {
        $krok_user = $value3['user_id'];
        $kafedra = $value3['kafedra'];
    if ($kafedra==1){
  // dd($kafedra);
// exit();
        $zapros = KrokSurgery::where('user_id','=',$krok_user)->first();
// dd($zapros);
// exit();
if (is_null($zapros))
     {
       $zapros=KrokSurgery::updateOrCreate(['user_id'=>$krok_user, 'vk'=>$value3['vk'], 
'bt'=>$value3['bt'], 'bin'=>$value3['bin'], 'bs'=>$value3['bs'],'bak'=>$value3['bak'], 'bp'=>$value3['bp'], 'pk'=>$value3['pk'], 'year1'=>$value3['year1'], 'year2'=>$value3['year2'], 'kz'=>$value3['kz'], 'kafedra'=>$value3['kafedra']  ]);
   }
    else{   $zapros=KrokSurgery::where('user_id','=',$krok_user)->where('kafedra','=',$kafedra)->update(['user_id'=>$krok_user, 'vk'=>$value3['vk'], 
'bt'=>$value3['bt'], 'bin'=>$value3['bin'], 'bs'=>$value3['bs'],'bak'=>$value3['bak'], 'bp'=>$value3['bp'], 'pk'=>$value3['pk'], 'year1'=>$value3['year1'], 'year2'=>$value3['year2'], 'kz'=>$value3['kz'], 'kafedra'=>$value3['kafedra']  ]);
        }
}
if ($kafedra==2) {
 $zapros2 = KrokAnest::where('user_id','=',$krok_user)->first();
// dd($zapros);
// exit();
if (is_null($zapros2))
     {
       $zapros2=KrokAnest::updateOrCreate(['user_id'=>$krok_user, 'vk'=>$value3['vk'], 
'm1'=>$value3['m1'], 'm1p'=>$value3['m1p'], 'm2'=>$value3['m2'],'m2p'=>$value3['m2p'], 'm3'=>$value3['m3'], 'm4'=>$value3['m4'], 'm5'=>$value3['m5'], 'm6'=>$value3['m6'], 'kz'=>$value3['kz'], 'kafedra'=>$value3['kafedra']  ]);
   }
    else{   $zapros2=KrokAnest::where('user_id','=',$krok_user)->where('kafedra','=',$kafedra)->update(['user_id'=>$krok_user, 'vk'=>$value3['vk'], 
'm1'=>$value3['m1'], 'm1p'=>$value3['m1p'], 'm2'=>$value3['m2'],'m2p'=>$value3['m2p'], 'm3'=>$value3['m3'], 'm4'=>$value3['m4'], 'm5'=>$value3['m5'], 'm6'=>$value3['m6'], 'kz'=>$value3['kz'], 'kafedra'=>$value3['kafedra']  ]);
        }

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
