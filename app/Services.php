<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Services extends Model
{
    /* SERVICES
    ********************/
    // Return data
    public function getServices(){
    	
        return "";
    }

    // Get Services
    public function getServicesItem($request){
        $items = DB::table('services')
                ->select(['id_service', 'title', 'content'])
                ->where('id_service', '=', $request["id"])
                ->get();

        return $items;
    }

    // New Services
    public function newServices($request){
        $items = DB::table('services')->insert(
            ['title' => $request['name'], 'content' => $request['content'], 'image' => "Sense imatge"]
        );

        return $items;
    }

    // Update Services
    public function updateServices($request){        
        $items = DB::table('services')
                ->where('id_service', '=', $request["id"])
                ->update(['title' => $request["name"], 'content' => $request["content"]]);

        return $items;
    }

    // Delete Services
    public function deleteServices($request){        
        $items = DB::table('services')
                ->where('id_service', '=', $request["id"])
                ->delete();

        return $items;
    }
}
