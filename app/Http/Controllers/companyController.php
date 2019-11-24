<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contact;

class companyController extends Controller
{
    /* COMPANY
    ********************/
    // Return company info
    public function getCompany(){
        $company = new Company();
        $contact = new Contact();

    	return view('company')
                ->with('data',$company->getCompany())
                ->with('totalContacts', $contact->getCountContacts());
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
}
