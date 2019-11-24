<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Contact;

class blogController extends Controller
{
    // Return data
    public function getAllBlog(){
        $blog = new Blog();
        $contact = new Contact();

    	return view('blog')
                ->with('data',$blog->getAllBlog())
                ->with('totalContacts', $contact->getCountContacts());
    }

    // Get blog item
    public function getAjaxBlogItem(Request $request){
        $blog = new Blog();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$blog->getBlogItem($request)
        ]);
    }

    // Delete blog item
    public function getAjaxNewBlog(Request $request){
        $blog = new Blog();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$blog->newBlog($request)
        ]);
    }

    // Update blog item
    public function getAjaxUpdateBlog(Request $request){
        $blog = new Blog();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$blog->updateBlog($request)
        ]);
    }

    // Update blog item
    public function getAjaxDeleteBlog(Request $request){
        $blog = new Blog();
                
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$blog->deleteBlog($request)
        ]);
    }
}
