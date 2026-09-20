<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class SeminarNameController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function getname(Request $request)
    {

    $d=$request->napr;
   
    $direction = DB::table('napravlenias')
    ->leftjoin('settings_bal', 'napravlenias.id', '=', 'settings_bal.direction' )
    ->select('napravlenias.id', 'napravlenias.direction','settings_bal.min_bal' )
    ->orderBy('modul', 'asc')
     ->get(); 

     //Юнион запрос для вывода семинаров с оценками
    $seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema','seminar_temas.morning', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title')
     ->where('seminarus.direction', $d)
     ->orderBy('npp', 'asc')
     ->get();

  return view ('admink.kerivnuk.name_seminar',compact('direction','d','seminarse'));
    }

     public function postname(Request $request)
    {
    	// dump($request);
    	// exit();
 if(isset($_POST['hook']) and $_POST['hook']=='del_temaseminar') {
   DB::table('seminar_temas')
      ->where('id', $_POST['del_temas'])
      ->where('teor_nav', $_POST['napr'])
      ->delete();
  echo "Тему семінару видаленно";
}

  if(isset($_POST['hook']) and $_POST['hook']=='create_temaseminar') {
    // dump($_POST);
    // exit();
    $texts=$_POST['tema'];
    //$text = str_replace("&bull;"," ",$texts);
    $text = htmlspecialchars_decode($_POST['tema']);
    $text = preg_replace("/\r\n|\r/", "<br />", $text);
    //$text = preg_replace('/&bull//&bull/', ' ',$input);
    // $text = str_replace("&bull"," ",$texts);
   //  $t=htmlspecialchars_decode($texts);
   //  dump($text);
   // exit();
   $temas= DB::table("seminar_temas")
        ->where('id',$_POST['id'])
        ->update(['tema'=> $text,
          'npp'=> $_POST['npps'],
          'pract_nav'=> $_POST['vopros'],  
          'morning'=> $_POST['listliterature'],       
        'created_at'=>Carbon::now()
         ]); 
    
  echo "Тему відредаговано";
 }

 if(isset($_POST['hook']) and $_POST['hook']=='del_tema') {
   DB::table('seminarus')
      ->where('id', $_POST['del_tema'])
      ->where('direction', $_POST['napr'])
      ->delete();
  echo "Назву семінару видаленно";

  DB::table('seminar_temas')
      ->where('id_seminar', $_POST['del_tema'])
      ->where('teor_nav', $_POST['napr'])
      ->delete();
  echo "Теми семінару видаленно";
  
 }


 if(isset($_POST['hook']) and $_POST['hook']=='create_tema') {
 	$do = '<span style="color: red; font-size: 1em"><strong>';
	$end = '</strong></span>';
 	$seminarse = DB::table('seminarus')
   ->select('seminarus.id', 'seminarus.direction', 'seminarus.seminar_title')
     ->where('seminarus.id', $_POST['new_temaid'])
     ->get();
	if(!empty($seminarse)){
      $go = DB::table("seminarus")
        ->where('id',$_POST['new_temaid'])
         ->update(['seminar_title'=> $do.$_POST['new_tema'].$end,
        'created_at'=>Carbon::now()
         ]);
          echo "Запис збереженно";
	}else {
       echo "При збереженні виникла помилка!!";
	}
  
 }


 if(isset($_POST['hook']) and $_POST['hook']=='obratu') {
 	$seminarse = DB::table('seminar_temas')
   ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
   ->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.morning', 'seminar_temas.pract_nav','seminarus.direction', 'seminar_temas.teor_nav','seminar_temas.element','seminarus.seminar_title as title')
     ->where('seminarus.direction', $_POST['napr'])
     ->orderBy('npp', 'asc')
     ->get();
	
   $sem=json_encode($seminarse);
   echo $sem;
 }

if(isset($_POST['hook']) and $_POST['hook']=='new') {
	$do = '<span style="color: red; font-size: 1em"><strong>';
	$end = '</strong></span>';
	 DB::table('seminarus')
     ->insert(['seminar_title'=> $do.$_POST['name'].$end,
        'direction'=> $_POST['napr'],
        'npp_main'=>$_POST['npp'],
        'kafedra'=>1,
        'created_at'=>Carbon::now()
 ]);
   echo "Запис збереженно";
 }
if(isset($_POST['hook']) and $_POST['hook']=='table_seminar') {
	
	$seminar_name = DB::table('seminarus')
    ->select('seminarus.id', 'seminarus.seminar_title','seminarus.npp_main','seminarus.direction' )
    ->where('direction', $_POST['napr'])
     ->get(); 
   $table=json_encode($seminar_name);
   echo $table;
 }
if(isset($_POST['hook']) and $_POST['hook']=='seminar_tema') {

 DB::table('seminar_temas')
     ->insert(['tema'=> $_POST['tema'],
        'pract_nav'=> $_POST['vopros'],
        'teor_nav'=>$_POST['napr'],
        'npp'=>$_POST['npp'],
        'element'=>$_POST['npp'],
        'id_seminar'=>$_POST['name'],
        'kafedra'=>1,
        'created_at'=>Carbon::now()
 ]);
   echo "Запис збереженно";
 }



   }
 }