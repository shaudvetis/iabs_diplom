<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\UserProfile;
use Illuminate\Support\Facades\View;
use Mail;
use DB;
use Carbon\Carbon;

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
     
     public function postMail(Request $request)
    {
      $data=$request->message;
      $currentUser = Auth::user();
      $user = $currentUser->name;
      $files = $request->file('attachment');

   Mail::send('email',['data' => $data, 'user' => $user], function ($message) use ($files) {
   $message->to('shaudvetis@gmail.com', 'akademiya')->subject('Кафедра Хірургії №1');
   $message->from('shaudvetis@gmail.com', 'Питання по сайту');
   if($files > 0) {
   foreach($files as $file) {
   $message->attach($file->getRealPath(), array(
     'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name      
     'mime' => $file->getMimeType())
                );
            }
        }
    });

   return back();
    } 

}
