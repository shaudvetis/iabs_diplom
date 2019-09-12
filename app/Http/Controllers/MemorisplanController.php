<?php

namespace App\Http\Controllers;
use App\Memorisplan;

use Illuminate\Http\Request;

class MemorisplanController extends Controller
{	

	private $data = [];

	public function Planoperindex() {

		$this->data['value'] = Memorisplan::find(1);
		return view('memorisplan', $this->data);
	}


}

	





