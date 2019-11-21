<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    /* COMPANY
    ********************/
    // Return company info
    public function getCompany(){
        return "";
    }

    // Get company
    public function getCompanyItem($request){
        $items = DB::table('company')
                ->select(['id_company', 'name', 'content', 'image'])
                ->where('id_company', '=', $request["id"])
                ->get();

        return $items;
    }

    // Update company
    public function updateCompany($request){        
        $items = DB::table('company')
                ->where('id_company', '=', $request["id"])
                ->update(['name' => $request["name"], 'content' => $request["content"]]);

        return $items;
    }

    /* TEAM
    ********************/
    // Return team info
    public function getTeam(){
        return "";
    }

    // Get team
    public function getTeamItem($request){
        $items = DB::table('professional_team')
                ->select(['id_team', 'name', 'position', 'mail', 'content', 'image'])
                ->where('id_team', '=', $request["id"])
                ->get();

        return $items;
    }

    // New team
    public function newTeam($request){
        $items = DB::table('professional_team')->insert(
            ['name' => $request['name'], 'content' => $request['content'], 'position' => $request['position'], 'mail' => $request['mail'], 'image' => "Sense imatge"]
        );

        return $items;
    }

    // Update team
    public function updateTeam($request){        
        $items = DB::table('professional_team')
                ->where('id_team', '=', $request["id"])
                ->update(['name' => $request["name"], 'content' => $request["content"], 'position' => $request["position"], 'mail' => $request["mail"]]);

        return $items;
    }

    // Delete team
    public function deleteTeam($request){        
        $items = DB::table('professional_team')
                ->where('id_team', '=', $request["id"])
                ->delete();

        return $items;
    }

    /* CLIENTS
    ********************/
    // Return clients info
    public function getClients(){
        return "";
    }

    // Get Clients
    public function getClientsItem($request){
        $items = DB::table('client')
                ->select(['id_client', 'name', 'content'])
                ->where('id_client', '=', $request["id"])
                ->get();

        return $items;
    }

    // New Clients
    public function newClients($request){
        $items = DB::table('client')->insert(
            ['name' => $request['name'], 'content' => $request['content'], 'image' => "Sense imatge"]
        );

        return $items;
    }

    // Update Clients
    public function updateClients($request){        
        $items = DB::table('client')
                ->where('id_client', '=', $request["id"])
                ->update(['name' => $request["name"], 'content' => $request["content"]]);

        return $items;
    }

    // Delete Clients
    public function deleteClients($request){        
        $items = DB::table('client')
                ->where('id_client', '=', $request["id"])
                ->delete();

        return $items;
    }
}
