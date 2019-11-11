<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para que funcione la BD

class AjaxController extends Controller
{
    public function getAjaxContact(Request $request){
        $prova = $request['order'][0]['column'];

        $items = DB::table('contact_items')
                ->select(['id_contact', 'name', 'phone_number', 'mail', 'content', 'date'])
                ->get();
        
        return response()->json([
                'success'=>'Processat amb èxit ', 
                'data'=>$items, 
                'draw'=>6, 
                'recordsTotal'=>1,
                'recordsFiltered'=>1,
            ]);
    }

    public function getAjaxBlog(Request $request){
        $prova = $request['order'][0]['column'];

        $items = DB::table('blog')
                ->select(['id_blog', 'title', 'content', 'image', 'date', 'important', 'visible'])
                ->get();
        
        return response()->json([
                'success'=>'Processat amb èxit ', 
                'data'=>$items, 
                'draw'=>6, 
                'recordsTotal'=>1,
                'recordsFiltered'=>1,
            ]);
    }
}
