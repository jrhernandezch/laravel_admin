<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\Contact;

class dashboardController extends Controller
{
    // Return data
    public function getInfo(){
        $dashboard = new Dashboard();
        $contact = new Contact();

    	return view('home')
                ->with('home', $dashboard->getInfo())
                ->with('totalContacts', $contact->getCountContacts());
    }
}
