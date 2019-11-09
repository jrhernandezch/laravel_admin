<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class homeController extends Controller
{
    // Return data
    public function getInfo(){
        $home = new Home();

    	return view('home')
                ->with('data',$home->getInfo());
    }
}
