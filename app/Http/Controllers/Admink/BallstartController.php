<?php

namespace App\Http\Controllers\Admink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use App\UserProfile;
use App\OcenkiTables;
use App\Intern\SeminarTema;
use Carbon\Carbon;


class BallstartController extends Controller
{
    public function getStart(Request $request){

        //Определяет интерна и добовляем к поиску по ссылке
        $id_users = $request->user_id;

//Для определения фамилии интерна в форме модальной
        $name = UserProfile::select('surname','name')
            ->where('user_id',$id_users)
            ->get();
        $get_names = [];
        foreach ($name as $value){
            $get_names = $value;
        }
//Вывод списка интернов по десяткам для кнопки
        $interns_id = DB::table('user_profiles')
         //   ->leftjoin('ocenki_tables', function($join) {
        //    $join->on('user_profiles.user_id', '=', 'ocenki_tables.user_id');
//                    ->select(DB::raw("SUM('ocenki_tables.bal')"))
//                    ->where('ocenki_tables.id_seminar', '14');

          //  })
            ->select('user_profiles.id','user_profiles.user_id','user_profiles.surname', 'user_profiles.name')
            ->where('user_profiles.decatki', '1')
            ->get();
//Вывод списка интернов по десяткам для кнопки
        $interns_id_2 = DB::table('user_profiles')
         //   ->leftjoin('ocenki_tables', function($join) {
         //       $join->on('user_profiles.user_id', '=', 'ocenki_tables.user_id');
//                    ->select(DB::raw("SUM('ocenki_tables.bal')"))
//                    ->where('ocenki_tables.id_seminar', '14');
        //    })
            ->select('user_profiles.id','user_profiles.user_id','user_profiles.surname', 'user_profiles.name')
            ->where('user_profiles.decatki', '2')
            ->get();
//Вывод номера семинара и отправка его в таблицу с оценками
        $direction = DB::table('napravlenias')
            ->select('id', 'direction')
            ->where('id', '1')
            ->get();

        //Юнион запрос для вывода семинаров с оценками
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

        //Работа с датой
        $date = new Carbon();
        setlocale(LC_TIME, 'Russian');
        $date = iconv("windows-1251","utf-8", $date->formatLocalized('%A %d %B'));

        return view('admink.ball_start',compact('direction','date','id_users', 'interns_id_2','interns_id','seminar', 'get_names'));
    }

    public function getStartpost(Request $request, OcenkiTables $ocenki){

        $data_request = $request->all();

        $data_insert = array();
        foreach($data_request as $key1 => $value1) {
            if($key1 != '_token' && $key1 != 'sub') {
                foreach($value1 as $key2 => $value2) {
                    $data_insert[$key2][$key1] = $value2;
                }
            }
        }
//          dump($data_insert);
//         exit();

        $ocenki_remove = $ocenki->where('user_id', $data_request['user_id']);
        $ocenki_remove->delete();
        $ocenki->insert($data_insert);
        return redirect('admink.ball_start');
    }
}

