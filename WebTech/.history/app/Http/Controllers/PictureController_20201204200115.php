<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    public function list($id) {  
        
        $pictures_path = DB::table('pictures')->->where([['product_id',$id]])->get();
        
        dump($pictures_path);
       
            
        return response()->json(['data' => $pictures_path]);
    }
}
