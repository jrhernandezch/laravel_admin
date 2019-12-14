<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UploadImage extends Model
{
    // Upload the image on BD
    public function updateImage($id, $imgName, $dir){

        switch ($dir) {
            case "blog":
                $column = "id_blog";
                $bd = "blog";
                break;
            case "clients":
                $column = "id_client";
                $bd = "client";
                break;
            case "about":
                $column = "id_company";
                $bd = "company";
                break;
            case "slide":
                $column = "id_slide";
                $bd = "slide";
                break;
            case "services":
                $column = "id_service";
                $bd = "services";
                break;
            case "success":
                $column = "id_success";
                $bd = "success_projects";
                break;
            case "team":
                $column = "id_team";
                $bd = "professional_team";
                break;
        }

        $items = DB::table($bd)
                ->where($column, '=', $id)
                ->update(['image' => $imgName]);

        return $items;
    }
}
