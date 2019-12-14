<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UploadImage;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost($dir)
    {
        $updateImage = new UploadImage();

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        $dir_separator = DIRECTORY_SEPARATOR;
        //request()->image->move(public_path('/var/www/laravel_template/public/img/'.$dir.$dir_separator), $imageName);
        request()->image->move('/var/www/laravel_template/public/img/'.$dir.'/', $imageName);

        $updateImage->updateImage(request()->iditem, $imageName, $dir);

        return back()
            ->with('success',' Imatge pujada correctament.')
            ->with('image',$imageName);
    }
}
