<?php

namespace App\Repositories;
use Auth;
use App\User;
use Carbon\Carbon;
use App\{
    UserProfile,
    ModelIntern\Inputformsday
};

use DB;

class InternRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_inputformsday;

    /**
     * Create a new InternRepository instance.
     *
     * @param  \App\Models\Intern\Inputformsday $model_inputformsday;
     */
   
    public function __construct(Inputformsday $model_inputformsday, UserProfile $userprofile)
    {
        $this->model_inputformsday = $model_inputformsday;
        $this->model_userprofile = $userprofile;
    }

    /**
     * Запрос на вівод курации заполнения и старта для поиска по МКБ
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function inputformsday($request)
  {

   $query=DB::select("select icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where gr2='' and gr3='' order by ur1, gr1,gr2, gr3 ");
  
  return $query;

  }

 /**
     * Запись курации заполнения 
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

   public function postinputforms ($request, $currentUser)
{
  
        $inputFormsday = new Inputformsday();
        $inputFormsday->fio = $request->get('fio');
        $inputFormsday->diagnoses = $request->get('diagnoses');
        // $inputFormsday->mkb = $request->get('mkb');
        $inputFormsday->num_card = $request->get('num_card');
        $inputFormsday->apdate = $request->get('apdate');
        // $inputFormsday->apdate_end = $request->get('apdate_end');
        $inputFormsday->comm = $request->get('comm');
        $inputFormsday->direction = $request->get('direction');
        $inputFormsday->type_work = $request->get('type_work');
        $inputFormsday->oper = $request->get('oper');
        $inputFormsday->id_student = $currentUser->id;
        $inputFormsday->save();

        return $inputFormsday;
}

 /**
     * Вывод архива курации заполнения 
     *
     */

    public function getarchivinput($request, $calendars, $calendarpo,$currentUser)
  {

   $result = DB::table('inputformsdays as m1')
         ->join('napravlenias', 'm1.direction', '=', 'napravlenias.id' )
         ->join('user_profiles', 'm1.id_student', '=', 'user_profiles.user_id' )
         ->select('m1.id as id_table','m1.id_student', 'm1.fio','m1.apdate_end','m1.comm','m1.diagnoses','m1.num_card','m1.apdate','m1.direction as id_direction','m1.oper','m1.type_work','napravlenias.direction','user_profiles.surname','user_profiles.name')
         ->where('m1.id_student', $currentUser->id);
        if (!empty($calendars && $calendarpo))
         $result->whereBetween('m1.apdate', [$calendars, $calendarpo]);
       if (!empty($request->direction) && $request->direction != 999)
         $result->Where('m1.direction', $request->direction);
          
  
  return $result->get();

  }

 /**
     * Обновление архива курации заполнения 
     *
     */

    public function updatearchivinput($request)
  {

   $inputFormsday = Inputformsday::where('id','=',$request->table_id)
         ->update(['apdate_end' => $request->apdate_end,'diagnoses' => $request->diagnoses, 'num_card'=>$request->num_card,
         'oper'=>$request->oper,
         'comm'=>$request->comm,
         'apdate'=>$request->apdate,
         'type_work'=>$request->type_work,
         'fio'=>$request->fio,
         'direction'=>$request->napravlenie
          ]);

  return $inputFormsday;

  }
                   

}
