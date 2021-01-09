<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function list($id) {  
        
        $pictures_path = DB::table('pictures')->where([['product_id',$id]])->get();
        
      
       
            
        return response()->json(['data' => $pictur, 'rowsNumber' => $rowsNumber]);
    }
}
