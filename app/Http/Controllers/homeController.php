<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\Contact;

class homeController extends Controller
{
    /* GENERAL INFO
    ********************/
    // Return general info
    public function getGeneralInfo(){
        $generalInfo = new Home();
        $contact = new Contact();

    	return view('generalinfo')
                ->with('generalInfo',$generalInfo->getGeneralInfo())
                ->with('totalContacts', $contact->getCountContacts());
    }

    // Get general info item
    public function getAjaxGeneralInfoItem(Request $request){
        $generalInfo = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$generalInfo->getGeneralInfoItem($request)
        ]);
    }

    // Update general info item
    public function getAjaxUpdateGeneralInfo(Request $request){
        $generalInfo = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$generalInfo->updateGeneralInfo($request)
        ]);
    }

    /* SLIDE
    ********************/
    // Get slide item
    public function getAjaxSlideItem(Request $request){
        $slide = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$slide->getSlideItem($request)
        ]);
    }

    // Update slide item
    public function getAjaxUpdateSlide(Request $request){
        $slide = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$slide->updateSlide($request)
        ]);
    }

    /* SOCIAL MEDIA
    ********************/
    // Get social media item
    public function getAjaxSocialMediaItem(Request $request){
        $socialmedia = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$socialmedia->getSocialMediaItem($request)
        ]);
    }

    // Update social media item
    public function getAjaxUpdateSocialMedia(Request $request){
        $socialmedia = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$socialmedia->updateSocialMedia($request)
        ]);
    }

    /* INFORMATION ICONS
    ********************/
    // Get info icons item
    public function getAjaxInfoIconsItem(Request $request){
        $infoIcons = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$infoIcons->getInfoIconsItem($request)
        ]);
    }

    // Update info icons item
    public function getAjaxUpdateInfoIcons(Request $request){
        $infoIcons = new Home();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$infoIcons->updateInfoIcons($request)
        ]);
    }
}
