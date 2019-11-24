<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SuccessCase extends Model
{
    /* SUCCESS CASES
    ********************/
    // Return data
    public function getSuccessCases(){
    	
        return "";
    }

    // Get Success case
    public function getSuccessCasesItem($request){
        $items = DB::table('success_projects')
                ->select(['id_success', 'title', 'content'])
                ->where('id_success', '=', $request["id"])
                ->get();

        return $items;
    }

    // New Success case
    public function newSuccessCases($request){
        $items = DB::table('success_projects')->insert(
            ['title' => $request['title'], 'content' => $request['content'], 'image' => "Sense imatge"]
        );

        return $items;
    }

    // Update Success case
    public function updateSuccessCases($request){        
        $items = DB::table('success_projects')
                ->where('id_success', '=', $request["id"])
                ->update(['title' => $request["title"], 'content' => $request["content"]]);

        return $items;
    }

    // Delete Success case
    public function deleteSuccessCases($request){        
        $items = DB::table('success_projects')
                ->where('id_success', '=', $request["id"])
                ->delete();

        return $items;
    }
}
