<?php

namespace App\Http\Controllers;

use App\CommonSetting;
use Illuminate\Http\Request;

class MemorisController extends Controller
{
	private $data = [];

	public function Surgeryindex() {
 $check = 'true';  //Эта переменная из students  чтоб запустился base
		$this->data['content'] = CommonSetting::find(1);
		return view('memoris', $this->data, compact('check'));
	}
	public function kerivnukmemoris() {
		$data = [];
 $check = 'true';  //Эта переменная из students  чтоб запустился base
		$this->data['content'] = CommonSetting::find(1);
		return view('admink.kerivnuk.memoris', $this->data, compact('check'));
	}

 }  


