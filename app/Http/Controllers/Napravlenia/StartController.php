<?php

namespace App\Http\Controllers\Napravlenia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Intern\Napravlenia;
use App\Intern\SeminarTema;
use App\Intern\Seminaru;
use App\Inputformsday;
use Auth;
use App\User;
use App\Formssurgeryday;
use App\Formspracticeday;
use App\Nightworkday;
use App\Nightpractic;
use DB;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSurgery()
    {

$seminarse = DB::table('seminar_temas')
 ->join('seminarus', 'seminar_temas.id_seminar', '=', 'seminarus.id' )
->select('seminar_temas.id', 'seminar_temas.id_seminar', 'seminar_temas.tema', 'seminar_temas.npp',  'seminarus.npp_main', 'seminar_temas.pract_nav', 'seminar_temas.teor_nav','seminar_temas.element')
 ->where('seminarus.direction', '1');



$seminar = DB::table('seminarus')
->select('id', 'id  as id_seminar', 'seminar_title as tema', 'npp',  'npp_main', 'pract_nav', 'teor_nav','element')
 ->where('seminarus.direction', '1')
   ->union($seminarse)
    ->orderBy('id_seminar',   'asc')
->get();


      $currentUser = Auth::user();
      $forms = Inputformsday::where('id_student', $currentUser->id)
      ->Where('direction', 'Вхідний контроль')
      ->get();

     // Add to each form object his user object in user field
      foreach ($forms as &$form) {
      $form->user = User::find($currentUser->id);
      }

//dd($form);

    $formssurgeryday = Formssurgeryday::where('id_student', $currentUser->id)
    ->Where('direction', 'Вхідний контроль')
    ->get();
    foreach ($formssurgeryday as &$surgery) {
      $surgery->user = User::find($currentUser->id);
    }


    $formspracticeday = Formspracticeday::where('id_student', $currentUser->id)
     ->Where('direction', 'Вхідний контроль')
    ->get();
    foreach ($formspracticeday as &$formspractic) {
      $formspractic->user = User::find($currentUser->id);
 }

  $nightworkday = Nightworkday::where('id_student', $currentUser->id)->get();
    foreach ($nightworkday as &$nightwork) {
      $nightwork->user = User::find($currentUser->id);
 }

$nightpractic = Nightpractic::where('id_student', $currentUser->id)->get();
    foreach ($nightpractic as &$nightpract) {
      $nightpract->user = User::find($currentUser->id);
}
        return view('napravlenia.startsurgery', compact('forms','formssurgeryday','nightworkday','nightpractic', 'seminar'))->with('formspracticeday', $formspracticeday);
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
        //
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
