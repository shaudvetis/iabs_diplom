<?php

namespace App\Repositories;
use Auth;
use App\User;
use Carbon\Carbon;
use App\{
    OcenkiTables,
    UserProfile
};
use DB;

class TeacherRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_ocenki;
    protected $model_userprofile;
    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(OcenkiTables $ocenki, UserProfile $userprofile)
    {
        $this->model_ocenki = $ocenki;
        $this->model_userprofile = $userprofile;
    }

    /**
     * Create a query for ocenki.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectOcenki($request)
    {

   $query=DB::select("select ocenki_tables.user_id,m1.surname,m1.name, bal, lessons,id_seminarus, m3.npp, pr.zap, sur.nbsur, anest.krok from ocenki_tables

 JOIN( SELECT user_profiles.user_id, surname, name from user_profiles WHERE course ='$request->course' and course != 12 and surname!='' and  surname IS NOT NULL) as m1
   on ocenki_tables.user_id=m1.user_id

  JOIN (select id, npp from seminar_temas) as m3
   on ocenki_tables.tema=m3.id

 LEFT JOIN (SELECT user_id, count(lessons) as zap FROM ocenki_tables WHERE lessons=1 Group by user_id) AS pr 
   on m1.user_id=pr.user_id

 LEFT JOIN (SELECT user_id, zalik as nbsur FROM krok_surgeries WHERE kafedra=12 and zalik = 'Не Зараховано' ) AS sur 
   on ocenki_tables.user_id=sur.user_id

 LEFT JOIN (SELECT user_id, zalik as krok FROM krok_surgeries WHERE kafedra=13  and zalik = 'Не Зараховано') AS anest 
   on ocenki_tables.user_id=anest.user_id


  where   (bal<3 and bal=2 ) or (lessons=2 and bal<3) or (lessons=2 and bal IS NULL) or (sur.nbsur = 'Не Зараховано' or anest.krok = 'Не Зараховано') and surname!='' and  surname IS NOT NULL   Order By surname ASC, npp asc");
 
 $result1 = array();
 foreach ($query as $l) {
 $result1[$l->user_id]['surname'] = $l->surname.' '.$l->name;

 if ($l->id_seminarus == 2 || $l->id_seminarus == 25){
  if($l->bal == 2)
 $result1[$l->user_id]['nppab'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '' )
 $result1[$l->user_id]['nppab'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
 if ($l->id_seminarus == 1 || $l->id_seminarus == 21){
 if($l->bal == 2)
 $result1[$l->user_id]['nppvx'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppvx'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
 if ($l->id_seminarus == 3){
 if($l->bal == 2)
 $result1[$l->user_id]['npptx'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['npptx'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 4){
 if($l->bal == 2)
 $result1[$l->user_id]['npppr'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['npppr'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 5){
 if($l->bal == 2)
 $result1[$l->user_id]['nppyr'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppyr'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 6 || $l->id_seminarus == 23){
 if($l->bal == 2)
 $result1[$l->user_id]['nppsx'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppsx'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 7 || $l->id_seminarus == 24){
 if($l->bal == 2)
 $result1[$l->user_id]['nppgx'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppgx'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 19){
 if($l->bal == 2)
 $result1[$l->user_id]['nppkx'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppkx'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 9 || $l->id_seminarus == 22){
 if($l->bal == 2)
 $result1[$l->user_id]['nppop'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppop'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
if ($l->id_seminarus == 11){
 if($l->bal == 2)
 $result1[$l->user_id]['nppamb'][$l->npp] = 'T'.$l->npp.'/Bal-'.$l->bal.'<br>';
  if($l->lessons == 2 and $l->bal ==2 || $l->bal == 0 || $l->bal == '')
 $result1[$l->user_id]['nppamb'][$l->npp] = 'T'.$l->npp.'/NB'.'<br>';
}
$result1[$l->user_id]['zap'] = $l->zap;

$result1[$l->user_id]['surgery'] = $l->nbsur;

$result1[$l->user_id]['anest'] = $l->krok;
 }
         return $result1;
          

 
    }

                   

}
