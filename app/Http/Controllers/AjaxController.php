<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para que funcione la BD

class AjaxController extends Controller
{
    /* HOME 
    ***********************/
    // Get contact content
    public function getAjaxContact(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'name';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'phone_number';	
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'mail';	
        }elseif($request['order'][0]['column'] == 4){
            $orderBy = 'content';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
		}

        $items = DB::table('contact_items')
                ->select(['id_contact', 'name', 'phone_number', 'mail', 'content', 'date'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$items, 
            'draw'=>$request['draw'], 
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get blog content
    public function getAjaxBlog(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'title';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';	
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'image';	
        }elseif($request['order'][0]['column'] == 5){
            $orderBy = 'important';	
        }elseif($request['order'][0]['column'] == 6){
			$orderBy = 'visible';	
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
		}

        $items = DB::table('blog')
                ->select(['id_blog', 'title', 'content', 'image', 'date', 'important', 'visible'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$items, 
            'draw'=>$request['draw'], 
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get information icons content
    public function getAjaxIconsInfo(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'title';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'icon';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }

        $items = DB::table('icons_info')
                ->select(['id_icon', 'title', 'content', 'icon'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$items, 
            'draw'=>$request['draw'], 
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get information social media content
    public function getAjaxSocialMediaInfo(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'name';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'url';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }

        $items = DB::table('social_media')
                ->select(['id_socialmedia', 'name', 'url'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>$items, 
            'draw'=>$request['draw'], 
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get services content
    public function getAjaxServices(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'title';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';	
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'image';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }
        
        $items = DB::table('services')
                ->select(['id_service', 'title', 'content', 'image'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ',
            'data'=>$items, 
            'draw'=>$request['draw'],  
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get success case content
    public function getAjaxSuccessCase(Request $request){
        return response()->json([
            'success'=>'Processat amb èxit ', 
            'data'=>'', 
            'draw'=>6, 
            'recordsTotal'=>0,
            'recordsFiltered'=>0,
        ]);
    }
    
    // Get general info content
    public function getAjaxGeneralInfo(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'name';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }
        
        $items = DB::table('info_generic')
                ->select(['id_info', 'name', 'content'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ',
            'data'=>$items, 
            'draw'=>$request['draw'],  
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get slide info content
    public function getAjaxSlideInfo(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'title';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'image';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }
        
        $items = DB::table('slide')
                ->select(['id_slide', 'title', 'content', 'image'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ',
            'data'=>$items, 
            'draw'=>$request['draw'],  
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    /* ABOUT US 
    ***********************/
    // Get company info content
    public function getAjaxCompany(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'name';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'image';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }
        
        $items = DB::table('company')
                ->select(['id_company', 'name', 'content', 'image'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ',
            'data'=>$items, 
            'draw'=>$request['draw'],  
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get team info content
    public function getAjaxTeam(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'name';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'position';
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'content';
        }elseif($request['order'][0]['column'] == 4){
            $orderBy = 'mail';
        }elseif($request['order'][0]['column'] == 5){
            $orderBy = 'image';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }
        
        $items = DB::table('professional_team')
                ->select(['id_team', 'name', 'position', 'content', 'mail', 'image'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ',
            'data'=>$items, 
            'draw'=>$request['draw'],  
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }

    // Get clients info content
    public function getAjaxClients(Request $request){
        $orderBy = "date";

        if($request['order'][0]['column'] == 1){
			$orderBy = 'name';	
		}elseif($request['order'][0]['column'] == 2){
            $orderBy = 'content';
        }elseif($request['order'][0]['column'] == 3){
            $orderBy = 'image';
		}else{
			$orderBy = 'date';	
        }
        
        $direction = 'DESC';
		if($request['order'][0]['dir'] == 'asc'){
			$direction = 'ASC';
        }
        
        $items = DB::table('client')
                ->select(['id_client', 'name', 'content', 'image'])
                ->orderBy($orderBy, $direction)
                ->skip($request['start'])->take($request['length'])
                ->get();

        return response()->json([
            'success'=>'Processat amb èxit ',
            'data'=>$items, 
            'draw'=>$request['draw'],  
            'recordsTotal'=>$items->count(),
            'recordsFiltered'=>$items->count(),
        ]);
    }
}
