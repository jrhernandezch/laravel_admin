<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    /* GENERAL INFO
    ********************/
    // Return general info data
    public function getGeneralInfo(){
    	
        return "";
    }

    // Get general info item
    public function getGeneralInfoItem($request){
        $items = DB::table('info_generic')
                ->select(['id_info', 'name', 'content'])
                ->where('id_info', '=', $request["id"])
                ->get();

        return $items;
    }

    // Update general info item
    public function updateGeneralInfo($request){        
        $items = DB::table('info_generic')
                ->where('id_info', '=', $request["id"])
                ->update(['content' => $request["content"]]);

        return $items;
    }

    /* SLIDE INFO
    ********************/
    // Get slide item
    public function getSlideItem($request){
        $items = DB::table('slide')
                ->select(['id_slide', 'title', 'content', 'image'])
                ->where('id_slide', '=', $request["id"])
                ->get();

        return $items;
    }

    // Update slide item
    public function updateSlide($request){        
        $items = DB::table('slide')
                ->where('id_slide', '=', $request["id"])
                ->update(['title' => $request["title"], 'content' => $request["content"]]);

        return $items;
    }

    /* SOCIAL MEDIA INFO
    ********************/
    // Get social media item
    public function getSocialMediaItem($request){
        $items = DB::table('social_media')
                ->select(['id_socialmedia', 'url'])
                ->where('id_socialmedia', '=', $request["id"])
                ->get();

        return $items;
    }

    // Update social media item
    public function updateSocialMedia($request){        
        $items = DB::table('social_media')
                ->where('id_socialmedia', '=', $request["id"])
                ->update(['url' => $request["url"]]);

        return $items;
    }

    /* INFORMATION ICONS
    ********************/
    // Get info icons item
    public function getInfoIconsItem($request){
        $items = DB::table('icons_info')
                ->select(['id_icon', 'title', 'content', 'icon'])
                ->where('id_icon', '=', $request["id"])
                ->get();

        return $items;
    }

    // Update info icons item
    public function updateInfoIcons($request){        
        $items = DB::table('icons_info')
                ->where('id_icon', '=', $request["id"])
                ->update(['title' => $request["title"], 'content' => $request["content"], 'icon' => $request["icon"]]);

        return $items;
    }
}
