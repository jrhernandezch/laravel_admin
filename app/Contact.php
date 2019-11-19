<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    // Return data
    public function getAllContacts(){
        $items = DB::table('contact_items')
                ->select(['name', 'phone_number', 'mail', 'subject', 'content', 'date'])
                ->get();

        return $items;
    }

    // Get contact item
    public function getContactItem($request){
        $items = DB::table('contact_items')
                ->select(['id_contact', 'name', 'phone_number', 'mail', 'subject', 'content', 'date'])
                ->where('id_contact', '=', $request['id'])
                ->get();

        return $items;
    }

    // Delete contact item
    public function deleteContact($request){        
        $items = DB::table('contact_items')
                ->where('id_contact', '=', $request['id'])
                ->delete();

        return $items;
    }
}
