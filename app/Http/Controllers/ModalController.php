<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modal;
use Auth;
use App\User;
use App\UserProfile;
use DB;
use App\OcenkiTables;
use App\Intern\SeminarTema;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, OcenkiTables $ocenki, SeminarTema $model_course)
    {
        $id_users = $request->user_id;


        $intern = UserProfile::select('surname','name','user_id')
            ->get();


        $direction = DB::table('napravlenias')
            ->select('id', 'direction')
            ->where('id', '1')
            ->get();

        $seminarse = DB::table('seminar_temas')
            ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
            ->leftjoin('ocenki_tables', function($join) use ($id_users){
                $join->on('seminar_temas.id', '=', 'ocenki_tables.tema')
                    ->where('ocenki_tables.user_id', $id_users);
            })

            ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav', 'seminar_temas.teor_nav','seminar_temas.element', 'ocenki_tables.bal')
            ->where('seminarus.direction', '1');




        $seminar = DB::table('seminarus')
            ->select('id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main', 'pract_nav', 'teor_nav','element','bal')
            ->union($seminarse)
            ->where('seminarus.direction', '1')
            ->orderBy('id_seminar',   'asc')
            ->get();



        return view('modal',compact('intern', 'seminarse','seminar','direction','id_users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request, OcenkiTables $ocenki)
    {
        $data_request = $request->all();
        $data_insert = array();
        foreach($data_request as $key1 => $value1) {
            if($key1 != '_token' && $key1 != 'sub') {
                foreach($value1 as $key2 => $value2) {
                    $data_insert[$key2][$key1] = $value2;

                }
            }
        }

// dump($data_request);
// exit();
//$oce = new AtestatProfile;
        $ocenki_remove = $ocenki->where('user_id', $data_request['user_id']);
        $ocenki_remove->delete();
        $ocenki->insert($data_insert);

//        if(!Empty($ocenki)) {
//            $ocenki->update($data_insert);
//        }
//        else {
//
//            $ocenki->save($data_insert);
//        }
        //print_r($data_insert); die;



        return redirect('admink.ball_start');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OcenkiTables $ocenki){



        return view('admink.ball_start');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function show(Modal $modal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function edit(Modal $modal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modal $modal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modal $modal)
    {
        //
    }
}
