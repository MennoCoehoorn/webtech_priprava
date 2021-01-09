<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;
use HTTP\Response;

class PictureController extends Controller
{
    public function list($id) { 

        $images=[];
        $response = Response::new(
            200, 'OK', [ 'Content-Type' => 'multipart/form-data' ]
        );
        $pictures_path = DB::table('pictures')->select('picture_path')->where([['product_id',$id]])->orderBy('carousel_num')->get();
        foreach ($pictures_path as $pic){
            $img = imagecreatefromjpeg($pic->picture_path);
            header('Content-Type: image/jpeg');
            imagejpeg($img);
            //$images.push($img);
            $response->add_c()
        }

        
       
            
        return response($images) ->header('Content-Type', 'multipart/mixed');
    }
}
