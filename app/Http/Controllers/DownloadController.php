<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DownloadProfile;
use Auth;
use DB;
use App\User;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function downloadAction() {

         $currentUser = Auth::user();
         $id_user = $currentUser->id;

        $post = DownloadProfile::all()->where('id_student', $id_user)->first();
       
         if(!$post){
            $down_img = false;
            return view('download_profile', compact('down_img'));
          }
          else{

                //show pasport
                $post->pasport;
                $img_pasport =  $post->pasport;
                if($img_pasport === NULL) {
                    $get_pasport = NULL;
                }
                else { 
                    $get_pasport = explode(",", $img_pasport);
                }

                //show diplom

                $post->diplom;
                $img_diplom =  $post->diplom;
                if($img_diplom === NULL) {
                    $get_diplom = NULL;
                }
                else { 
                    $get_diplom = explode(",", $img_diplom);
                }


                //show ident_code

                $post->ident_code;
                $img_ident_code =  $post->ident_code;
                if($img_ident_code === NULL) {
                    $get_ident_code = NULL;
                }
                else { 
                    $get_ident_code = explode(",", $img_ident_code);
                }


                //show diplom_compl

                $post->diplom_compl;
                $img_diplom_compl =  $post->diplom_compl;
                if($img_diplom_compl === NULL) {
                    $get_diplom_compl = NULL;
                }
                else { 
                    $get_diplom_compl = explode(",", $img_diplom_compl);
                }


                //show certificate

                $post->certificate;
                $img_certificate =  $post->certificate;
                if($img_certificate === NULL) {
                    $get_certificate = NULL;
                }
                else { 
                    $get_certificate = explode(",", $img_certificate);
                }


                //show health_book

                $post->health_book;
                $img_health_book =  $post->health_book;
                if($img_health_book === NULL) {
                    $get_health_book = NULL;
                }
                else { 
                    $get_health_book = explode(",", $img_health_book);
                }


                //show foto

                $post->foto;
                $img_foto =  $post->foto;
                if($img_foto === NULL) {
                    $get_foto = NULL;
                }
                else { 
                    $get_foto = explode(",", $img_foto);
                }





            //down_img - загружаеться или нет
            $down_img = true;

        
             
  

            return view('download_profile', compact('get_pasport', 'get_diplom', 'get_ident_code', 'get_diplom_compl', 'get_certificate', 'get_health_book', 'get_foto', 'down_img', 'id_user'));
          }
        
        // //$img_array = 'будьласка завантажте забраження ';
        
        
    }


    public function downloadIndex(Request $request) {
        
          $currentUser = Auth::user();
          if ($request->hasFile('pasport')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["pasport"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                DownloadProfile::where('id_student', $id_user )
                        ->update(['pasport' =>  $img_string ]);
                // DB::insert('insert into `download_profiles` (`id_student`, `pasport`) value (?,?)', [$id_user, $img_string]);
               
                $files = $request->file('pasport');
            
                 foreach($files as $file) {       
                    $fold = '\public\images\Foldername\pasport'.'\\'.$id_user;
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
               
                    
                
                }
                 if ($request->hasFile('diplom')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["diplom"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                 DownloadProfile::where('id_student', $id_user )
                        ->update(['diplom' =>  $img_string ]);
               
                $files = $request->file('diplom');
            
                 foreach($files as $file) {            
                    $fold = '\public\images\Foldername\diplom'.'\\'.$id_user;
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
                }

                if ($request->hasFile('ident_code')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["ident_code"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                 DownloadProfile::where('id_student', $id_user )
                        ->update(['ident_code' =>  $img_string ]);
               
                $files = $request->file('ident_code');
            
                 foreach($files as $file) {            
                    $fold = '\public\images\Foldername\ident_code'.'\\'.$id_user;
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
                }

                 if ($request->hasFile('diplom_compl')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["diplom_compl"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                 DownloadProfile::where('id_student', $id_user )
                        ->update(['diplom_compl' =>  $img_string ]);
               
                $files = $request->file('diplom_compl');
            
                 foreach($files as $file) {            
                    $fold = '\public\images\Foldername\diplom_compl'.'\\'.$id_user;
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
                }



                if ($request->hasFile('certificate')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["certificate"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                 DownloadProfile::where('id_student', $id_user )
                        ->update(['certificate' =>  $img_string ]);
               
                $files = $request->file('certificate');
            
                 foreach($files as $file) {            
                    $fold = '\public\images\Foldername\certificate'.'\\'.$id_user;
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
                }

                if ($request->hasFile('health_book')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["health_book"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                 DownloadProfile::where('id_student', $id_user )
                        ->update(['health_book' =>  $img_string ]);
               
                $files = $request->file('health_book');
            
                 foreach($files as $file) {            
                    $fold = '\public\images\Foldername\health_book'.'\\'.$id_user;
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
                }


                 if ($request->hasFile('foto')) { 
                // create string for db 'pasport'
                $img_string = '';
                foreach( $_FILES["foto"]["name"] as $req) {
                    $img_string .= $req.',';
                };

                $id_user = $currentUser->id;
                 DownloadProfile::where('id_student', $id_user )
                        ->update(['foto' =>  $img_string ]);
               
                $files = $request->file('foto');
            
                 foreach($files as $file) {            
                    $fold = '\public\images\Foldername\foto'.'\\'.$id_user; 
           
                    $file->move(base_path($fold), $file->getClientOriginalName());

                  }
                }
        //иначе если существует то сделай апдейт
                //нужно создать массив под каждый атрибут паспорт и т.д
                //и вставитть это все в таблицу true and false must update

        return redirect()->back();
    }
    public function add_string() {
        $sub = $_POST['sub'];
        if($sub === "sub") {
            $currentUser = Auth::user();
            $id_user = $currentUser->id;
            DB::insert('insert into `download_profiles` (`id_student`) value (?)', [$id_user]);
               
        }

        return redirect()->back();
    }
    

}