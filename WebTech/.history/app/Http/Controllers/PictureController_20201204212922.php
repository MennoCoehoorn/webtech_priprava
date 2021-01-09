<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;
use Response;

class PictureController extends Controller
{
    public function list($id) { 

       
        $pictures_path = DB::table('pictures')->select('picture_path','id')->where([['product_id',$id]])->orderBy('carousel_num')->get();
        /*foreach ($pictures_path as $pic){
            $img = imagecreatefromjpeg($pic->picture_path);
            header('Content-Type: image/jpeg');
            imagejpeg($img);
            $images.push($img);
            
        } */
        
       
            
          return response()->json(['data' => $pictures_path]);
    }

    public function show($id) { 

       
        $pictures_path = DB::table('pictures')->select('picture_path')->where([['id',$id]])->get();
        
            $img = imagecreatefromjpeg($pictures_path[0]->picture_path);
            header('Content-Type: image/jpeg');
            imagejpeg($img);
            
        
        
       
            
          return response($img);
    }
    public function delete(Picture $) { 
        
            $product->delete();
            // error handling is up to you!!! ;)
            return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
        
    }
}
