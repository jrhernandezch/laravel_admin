<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class blogController extends Controller
{
    // Return data
    public function getAllBlog(){
        $blog = new Blog();

    	return view('blog')
                ->with('data',$blog->getAllBlog());
    }
}
