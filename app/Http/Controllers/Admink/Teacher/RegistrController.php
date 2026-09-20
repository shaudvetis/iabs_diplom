<?php

namespace App\Http\Controllers\Admink\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegistrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
  return view('admink.kerivnuk.createuser');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
  
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
    if($request->student == 'student'){
      User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'course'=>$request['course'],
            'form'=>$request['form'],
            'kafedra'=>$request['kafedra'],
            'surname'=>$request['surname'],
            'fio'=>$request['fio'],
            'role'=>$request['role'],
            'clordinator'=>$request['clordinator'],
            'password' => Hash::make($request['password']),
            'textpass' => $request['password'],
        ]);
       }
     
     if($request->teacher == 'teacher') {
           User::create([
            'name' => $request['name'],
            'course'=>0,
            'kafedra'=>$request['kafedra'],
            'surname'=>$request['surname'],
            'fio'=>$request['fio'],
            'role'=>$request['role'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'textpass' => $request['password'],
        ]);
     }
       

      return back()->with('card-ok', __('Вчитель додан в базу'));;

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
