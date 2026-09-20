<?php
namespace App\Http\Controllers\Intern;
use App\Http\Controllers\Controller;
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

    /** Запуск страницы заглавной для студента
     */

    public function indexAction(Request $request)
    {
   
   // dump($request);
   // exit();
         $currentUser = Auth::user();
         $id_user = $currentUser->id;
        
         $profile = User::find(auth()->user()->id);
         
         $post=UserProfile::select('id','user_id')->where('user_id',auth()->user()->id)->first();

         // dump($post);
         // exit();
        // Если пустая в шаблоне показать доступ к меню ввода данніх
        if(!$post) {

            UserProfile::insert([
            'name' => $profile->name,
            'surname'=>$profile->fio,
            'lastname'=>$profile->surname,
            'course'=>$profile->course,
            'user_id' => auth()->user()->id,
            'kafedra_id'=>$profile->kafedra,
            'clordinator'=>$profile->clordinator,
        ]);
      
        }
      
   
    return view('intern.students');

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

    public function litera(Request $request)
    {
 
       return view('litera');
    }
// Запуск документов атестации
    public function docatest()
    {

       return view('docatest');
    }



}
