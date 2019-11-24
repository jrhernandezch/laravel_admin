<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contact;

class clientsController extends Controller
{
    /* CLIENTS
    ********************/
    // Return clients info
    public function getClients(){
        $company = new Company();
        $contact = new Contact();

    	return view('clients')
                ->with('data',$company->getClients())
                ->with('totalContacts', $contact->getCountContacts());
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
