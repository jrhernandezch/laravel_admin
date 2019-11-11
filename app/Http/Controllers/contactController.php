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
                ->with('data',$contact->getAllContacts());
    }
}
