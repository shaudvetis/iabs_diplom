<?php

namespace App\Http\Controllers;

use App\CommonSetting;
use Illuminate\Http\Request;

class MemorisController extends Controller
{
	private $data = [];

	public function Surgeryindex() {

		$this->data['content'] = CommonSetting::find(1);
		$this->data['pamatka'] = CommonSetting::find(2);
		return view('memoris', $this->data);
	}
	public function kerivnukmemoris() {
		$data = [];
		$this->data['content'] = CommonSetting::find(1);
		return view('admink.kerivnuk.memoris', $this->data);
	}

 }  


