<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    public function list($id) {  
        
        $pictures_path = DB::table('pictures')->select('picture_path')->where([['product_id',$id]])->order->get();
        
        dump($pictures_path);
       
            
        return response()->json(['data' => $pictures_path]);
    }
}
