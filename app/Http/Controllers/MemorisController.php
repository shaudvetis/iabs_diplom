<?php

namespace App\Http\Controllers;

use App\CommonSetting;
use Illuminate\Http\Request;

class MemorisController extends Controller
{
	private $data = [];

	public function Surgeryindex() {

		$this->data['content'] = CommonSetting::find(1);
		return view('memoris', $this->data);
	}

 }  


