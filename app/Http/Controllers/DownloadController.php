<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DownloadProfile;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function downloadAction()
    {
        return view('download_profile');
    }


    public function downloadIndex(Request $request)
    {

        return view('download_profile');
    }
}