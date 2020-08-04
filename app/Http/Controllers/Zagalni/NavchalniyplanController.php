<?php

namespace App\Http\Controllers\Zagalni;

use Illuminate\Http\Request;
use App\Page;
use App\Http\Controllers\Controller;

class NavchalniyplanController extends Controller
{
   
   private $data = [];

	public function planIndex() {
		
		$this->data['content'] = Page::find(1);
		return view('zagalni.navchalniy_plan', $this->data); 
  
    }
    public function kerivnukplan() {
    	$data = [];
	
		$this->data['content'] = Page::find(1);
		return view('admink.kerivnuk.navchalniy_plan', $this->data); 
  
    }

 }   

