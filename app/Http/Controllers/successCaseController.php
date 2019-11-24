<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuccessCase;
use App\Contact;

class successCaseController extends Controller
{
    /* SUCCESS CASES
    ********************/
    // Return success cases
    public function getSuccessCases(){
        $success = new SuccessCase();
        $contact = new Contact();

    	return view('successcase')
                ->with('successCases',$success->getSuccessCases())
                ->with('totalContacts', $contact->getCountContacts());
    }

    // Get Success Case item
    public function getAjaxSuccessCasesItem(Request $request){
        $success = new SuccessCase();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$success->getSuccessCasesItem($request)
        ]);
    }

    // New Success Case item
    public function getAjaxNewSuccessCases(Request $request){
        $success = new SuccessCase();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$success->newSuccessCases($request)
        ]);
    }

    // Update Success Case item
    public function getAjaxUpdateSuccessCases(Request $request){
        $success = new SuccessCase();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$success->updateSuccessCases($request)
        ]);
    }

    // Delete Success Case item
    public function getAjaxDeleteSuccessCases(Request $request){
        $success = new SuccessCase();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$success->deleteSuccessCases($request)
        ]);
    }
}
