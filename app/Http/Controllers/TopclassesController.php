<?php


namespace App\Http\Controllers;

use App\Topclasses;
use Illuminate\Http\Request;

class TopclassesController extends Controller
{
	private $data = [];

	public function Mainindex() {
		 $check = 'true';  //Эта переменная из students  чтоб запустился base

		$this->data['content'] = Topclasses::find(1);
		return view('topclasses', $this->data, compact('check'));
 }  
}