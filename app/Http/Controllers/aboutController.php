<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class aboutController extends Controller
{
    /* COMPANY
    ********************/
    // Return company info
    public function getCompany(){
        $company = new Company();

    	return view('company')
                ->with('data',$company->getCompany());
    }

    // Get company item
    public function getAjaxCompanyItem(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->getCompanyItem($request)
        ]);
    }

    // Update company item
    public function getAjaxUpdateCompany(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->updateCompany($request)
        ]);
    }

    /* TEAM
    ********************/
    // Return team info
    public function getTeam(){
        $company = new Company();

    	return view('team')
                ->with('data',$company->getTeam());
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

    /* CLIENTS
    ********************/
    // Return clients info
    public function getClients(){
        $company = new Company();

    	return view('clients')
                ->with('data',$company->getClients());
    }

    // Get clients item
    public function getAjaxClientsItem(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->getClientsItem($request)
        ]);
    }

    // New clients item
    public function getAjaxNewClients(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->newClients($request)
        ]);
    }

    // Update clients item
    public function getAjaxUpdateClients(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->updateClients($request)
        ]);
    }

    // Delete clients item
    public function getAjaxDeleteClients(Request $request){
        $company = new Company();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$company->deleteClients($request)
        ]);
    }
}
