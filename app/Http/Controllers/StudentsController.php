<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Page;
use App\UserProfile;
use App\Menus;
use Illuminate\Support\Facades\View;

class StudentsController extends Controller
{
    private $data = [];
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     *
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
     
//     public function index()
//     {
//         return view('home');
  //  }
//

    public function indexAction()
    {
   
       //$student = Auth::user();
        //if (!$user || $user->role != 0){
        //    abort(404);
      //}
        // $name_us = Auth::user()->name;
        // $auth = User::all()->where('name', $name_us)->first();
        // $id_user = $auth->id;



       // $arrMenu = Menus::all();
       // dump($arrMenu);
         $currentUser = Auth::user();
         $id_user = $currentUser->id;
        $post = UserProfile::all()->where('user_id', $id_user)->first();

     if($post === NULL) {
    $check = 'true';  
        }
        else{
         $check  = 'false';
        }

        return view('students')->with('check', $check);

    }
    public function showAction()
    {
        $user = Auth::user();
        if (!$user || $user->role != 0){
            abort(404);
        }

        $this->data['students'] = $user;
        return view('students', $this->data);
    } 
     

}
