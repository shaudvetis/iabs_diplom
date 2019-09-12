<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DownloadProfile;
use Auth;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function downloadAction()
    {
        return view('download_profile');
    }


    public function downloadIndex(Request $request)
    {
        $currentUser = Auth::user();

        //$data = $request->all();

        $download_profile = new DownloadProfile();

        if ($request->hasFile('pasport')) {
            $fileName = "fileName" . time() . '.' . request()->pasport->getClientOriginalExtension();
            $request->pasport->storeAs('logos', $fileName);
            $download_profile->pasport = $fileName;
        }
       /* if ($request->hasFile('diplom')) {
            $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();
            $request->fileToUpload->storeAs('logos', $fileName);
            $download_profile->diplom = $fileName;
        }
        if ($request->hasFile('ident_code')) {
            $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();
            $request->fileToUpload->storeAs('logos', $fileName);
            $download_profile->ident_code = $fileName;
        }
        if ($request->hasFile('diplom_compl')) {
            $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();
            $request->fileToUpload->storeAs('logos', $fileName);
            $download_profile->diplom_compl = $fileName;
        }
        if ($request->hasFile('certificate')) {
            $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();
            $request->fileToUpload->storeAs('logos', $fileName);
            $download_profile->certificate = $fileName;
        }
        if ($request->hasFile('health_book')) {
            $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();
            $request->fileToUpload->storeAs('logos', $fileName);
            $download_profile->health_book = $fileName;
        }
        if ($request->hasFile('foto')) {
            $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();
            $request->fileToUpload->storeAs('logos', $fileName);
            $download_profile->foto = $fileName;
        }*/

        $download_profile->id_student = $currentUser->id;


        $download_profile->save();
        dd($download_profile);
        //return view('inputforms');
    }
}