<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Page;

class StudentController extends Controller
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
//     }
//

    public function indexAction()
    {
   
       //$student = Auth::user();
        //if (!$user || $user->role != 0){
        //    abort(404);
      //}


   $this->data['pageData'] = Page::where('slug', 'internal-surgigal-curriculum')->first();

        return view('students', $this->data);

    }
    public function showAction()
    {
        $user = Auth::user();
        if (!$user || $user->role != 0){
            abort(404);
        }

        $this->data['student'] = $user;
        return view('students', $this->data);
    } 
     

}
