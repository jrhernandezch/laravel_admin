<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Contact;

class servicesController extends Controller
{
    /* SERVICES
    ********************/
    // Return services
    public function getServices(){
        $services = new Services();
        $contact = new Contact();

    	return view('services')
                ->with('services',$services->getServices())
                ->with('totalContacts', $contact->getCountContacts());
    }

    // Get clients item
    public function getAjaxServicesItem(Request $request){
        $services = new Services();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$services->getServicesItem($request)
        ]);
    }

    // New clients item
    public function getAjaxNewServices(Request $request){
        $services = new Services();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$services->newServices($request)
        ]);
    }

    // Update clients item
    public function getAjaxUpdateServices(Request $request){
        $services = new Services();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$services->updateServices($request)
        ]);
    }

    // Delete clients item
    public function getAjaxDeleteServices(Request $request){
        $services = new Services();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$services->deleteServices($request)
        ]);
    }
}
