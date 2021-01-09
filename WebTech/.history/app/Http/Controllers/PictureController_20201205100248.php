<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;
use Response;
use Storage;

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
    public function delete($picture_id) { 
        

            $picture=Picture::where([['id',$picture_id]])->delete();
            // error handling is up to you!!! ;)
            return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
        
    }

    public function uploadId($id){
        $request=request();
        $carousel=Picture::select('carousel_num')->where([['product_id',$id]])->orderBy('carousel_num','desc')->get();
        //$path = $request->file->store('public/img');
        $path=Storage::disk('public') -> put('',$request->file);
        $pic=new Picture;
        $pic->picture_path="img/".$path;
        $pic->product_id=$id;
        $pic->carousel_num=$carousel[0]->carousel_num+1;
        $pic->save();
        error_log($pic);
    }

    public function upload(){
        $request=request();
        
        //$path = $request->file->store('public/img');
        $path=Storage::disk('public') -> put('',$request->file);
        $pic=new Picture;
        $pic->picture_path="img/".$path;
        error_log($path);
        $pic->save();
        error_log()
        $id=$pic->id();

        error_log($pic);
        return response()->json(['status'=>'success','id' => $id]);
    }
}
