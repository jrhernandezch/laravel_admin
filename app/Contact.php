<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    // Return data
    public function getAllContacts(){
        $items = DB::table('contact_items')
                ->select(['name', 'phone_number', 'mail', 'content', 'date'])
                ->get();

        return $items;
    }
}
