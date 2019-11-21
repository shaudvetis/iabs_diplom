<?php

namespace App\Http\Controllers\Admink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DownloadProfile;
use Auth;
use App\User;

class DownloadoneController extends Controller
{
    public function getadmink(Request $request)
    {
    	$id_user = $request->id_student;

    	
$images = DownloadProfile::all()->where('id_student', $id_user)->first();
                //show pasport
               $images->pasport;
              $img_pasport =  $images->pasport;
             
          if($img_pasport === NULL) {
             $get_pasport = NULL;
            }
              else { 
              $get_pasport = explode(",", $img_pasport);
            }
         // dump($get_pasport);  
       	
    	//show diplom

                $images->diplom;
                $img_diplom =  $images->diplom;
                if($img_diplom === NULL) {
                    $get_diplom = NULL;
                }
                else { 
                    $get_diplom = explode(",", $img_diplom);
                }
    	
    	//show ident_code

                $images->ident_code;
                $img_ident_code =  $images->ident_code;
                if($img_ident_code === NULL) {
                    $get_ident_code = NULL;
                }
                else { 
                    $get_ident_code = explode(",", $img_ident_code);
                }
//show diplom_compl

                $images->diplom_compl;
                $img_diplom_compl =  $images->diplom_compl;
                if($img_diplom_compl === NULL) {
                    $get_diplom_compl = NULL;
                }
                else { 
                    $get_diplom_compl = explode(",", $img_diplom_compl);
                }

//show certificate

                $images->certificate;
                $img_certificate =  $images->certificate;
                if($img_certificate === NULL) {
                    $get_certificate = NULL;
                }
                else { 
                    $get_certificate = explode(",", $img_certificate);
                }
//show health_book

                $images->health_book;
                $img_health_book =  $images->health_book;
                if($img_health_book === NULL) {
                    $get_health_book = NULL;
                }
                else { 
                    $get_health_book = explode(",", $img_health_book);
                }
 //show foto

                $images->foto;
                $img_foto =  $images->foto;
                if($img_foto === NULL) {
                    $get_foto = NULL;
                }
                else { 
                    $get_foto = explode(",", $img_foto);
                }               
    return view('admink.user_download')->with('id_user',$id_user)->with('get_pasport',$get_pasport)->with('images',$images)->with('get_diplom',$get_diplom)->with('get_ident_code',$get_ident_code)->with('get_diplom_compl',$get_diplom_compl)->with('get_certificate',$get_certificate)->with('get_health_book',$get_health_book)->with('get_foto',$get_foto);    
   

                
       

}

}