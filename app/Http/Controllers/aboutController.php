<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class aboutController extends Controller
{
    // Return company info
    public function getCompany(){
        $company = new Company();

    	return view('company')
                ->with('data',$company->getCompany());
    }

    // Return team info
    public function getTeam(){
        $company = new Company();

    	return view('team')
                ->with('data',$company->getTeam());
    }

    // Return clients info
    public function getClients(){
        $company = new Company();

    	return view('clients')
                ->with('data',$company->getClients());
    }
}
