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

    // New blog item
    public function newBlog($request){
        $items = DB::table('blog')->insert(
            ['title' => $request['title'], 'content' => $request['content'], 'important' => $request['important'], 'visible' => $request['visible'], 'image' => "Sense imatge"]
        );

        return $items;
    }

    // Get blog item
    public function getBlogItem($request){
        $items = DB::table('blog')
                ->select(['id_blog', 'title', 'content', 'image', 'date', 'important', 'visible'])
                ->where('id_blog', '=', $request["id"])
                ->get();

        return $items;
    }

    // Update blog item
    public function updateBlog($request){        
        $items = DB::table('blog')
                ->where('id_blog', '=', $request["id"])
                ->update(['title' => $request["title"], 'content' => $request["content"], 'important' => $request['important'], 'visible' => $request['visible']]);

        return $items;
    }

    // Delete blog item
    public function deleteBlog($request){        
        $items = DB::table('blog')
                ->where('id_blog', '=', $request["id"])
                ->delete();

        return $items;
    }
}
