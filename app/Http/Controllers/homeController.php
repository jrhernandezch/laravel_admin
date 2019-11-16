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
                ->with('home',$home->getInfo());
    }

    // Return general info
    public function getGeneralInfo(){
        $generalInfo = new Home();

    	return view('generalinfo')
                ->with('generalInfo',$generalInfo->getGeneralInfo());
    }

    // Return services
    public function getServices(){
        $services = new Home();

    	return view('services')
                ->with('services',$services->getSuccessCases());
    }

    // Return success cases
    public function getSuccessCases(){
        $success = new Home();

    	return view('successcase')
                ->with('successCases',$success->getSuccessCases());
    }
}
