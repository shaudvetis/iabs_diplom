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
       $k =intval($request->kafedra);

       $intern =  DB::table('user_profiles')
    ->leftjoin('krok_surgeries', function ($join) use ($k) {
          $join->on('user_profiles.user_id','=','krok_surgeries.user_id')  
          ->where('krok_surgeries.kafedra', $k);
        })
       ->select('krok_surgeries.*','user_profiles.user_id', 'user_profiles.surname', 'user_profiles.name', 'user_profiles.course', 'user_profiles.decatki')

       ->where('course', $c)
       ->where('decatki', $d)
       ->orderBy('user_profiles.surname')
       ->get(); 

    // dump($intern);
    // exit();
   return view('admink.kroksurgery',compact('c','d','k','intern'));
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
    //             dump($data_insert );
    // exit();
    $krok_user = collect();
    foreach ($data_insert as $key => $value3) {
        $krok_user = $value3['user_id'];
        $kafedra = $value3['kafedra'];
  // dd($kafedra);
 // exit();
        $zapros = KrokSurgery::where('user_id','=',$krok_user)->where('kafedra','=',$kafedra)->first();
// dd($zapros);
// exit();
if (is_null($zapros))
     {
       $zapros=KrokSurgery::updateOrCreate(['user_id'=>$krok_user, 'vk'=>$value3['vk'], 
'vk_nb'=>$value3['vk_nb'], 'pr'=>$value3['pr'], 'pr_nb'=>$value3['pr_nb'],'kk'=>$value3['kk'], 'kk_nb'=>$value3['kk_nb'],'zalik'=>$value3['zalik'], 'kafedra'=>$kafedra ]);
   }
    else{   $zapros=KrokSurgery::where('user_id','=',$krok_user)->where('kafedra','=',$kafedra)->update(['user_id'=>$krok_user, 'vk'=>$value3['vk'], 
'vk_nb'=>$value3['vk_nb'], 'pr'=>$value3['pr'], 'pr_nb'=>$value3['pr_nb'],'kk'=>$value3['kk'], 'kk_nb'=>$value3['kk_nb'],'zalik'=>$value3['zalik'],'kafedra'=>$kafedra   ]);
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
