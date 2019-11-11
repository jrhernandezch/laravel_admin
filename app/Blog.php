<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    // Return data
    public function getAllBlog(){
        $items = DB::table('blog')
                ->select(['title', 'content', 'image', 'date', 'important', 'visible'])
                ->get();

        return $items;
    }
}
