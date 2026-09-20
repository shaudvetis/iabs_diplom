<?php

namespace App\Http\Controllers\Admink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TeacherRepository;


class ZvitNZController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected $repository;

    public function __construct(TeacherRepository $repository)
    {
       //$this->middleware('auth');

       $this->repository=$repository;  //Включили репозиторий
    }

    public function getzvit(Request $request){

$c = $request->course;
$d = $request->decatki;

$cards = $this->repository->selectOcenki($request);  
 if ($request->ajax()) {
            return response()->json([
                'table' => view("admink.ocenki-nb", ['cards' => $cards])->render(),
            ]);
        } 
// dump($cards);
// exit();
return view('admink.zvit_nezdacha',compact('c','d','cards'));
    }
    


}

