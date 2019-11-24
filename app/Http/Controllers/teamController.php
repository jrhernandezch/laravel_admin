<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contact;

class teamController extends Controller
{
    /* TEAM
    ********************/
    // Return team info
    public function getTeam(){
        $company = new Company();
        $contact = new Contact();

    	return view('team')
                ->with('data',$company->getTeam())
                ->with('totalContacts', $contact->getCountContacts());
    }

    // Get team item
    public function getAjaxTeamItem(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->getTeamItem($request)
        ]);
    }

    // New team item
    public function getAjaxNewTeam(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->newTeam($request)
        ]);
    }

    // Update team item
    public function getAjaxUpdateTeam(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->updateTeam($request)
        ]);
    }

    // Delete team item
    public function getAjaxDeleteTeam(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->deleteTeam($request)
        ]);
    }
}
