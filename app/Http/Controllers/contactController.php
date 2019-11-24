<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class contactController extends Controller
{
    // Return data
    public function getAllContacts(){
        $contact = new Contact();

    	return view('contact')
                ->with('data',$contact->getAllContacts())
                ->with('totalContacts', $contact->getCountContacts());
    }

    // Get contact item
    public function getAjaxContactItem(Request $request){
        $contact = new Contact();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$contact->getContactItem($request)
        ]);
    }

    // Delete contact item
    public function getAjaxDeleteContact(Request $request){
        $contact = new Contact();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$contact->deleteContact($request)
        ]);
    }
}
