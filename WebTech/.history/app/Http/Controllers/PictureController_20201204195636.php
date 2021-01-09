<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function list($page) {  
        
        $pictures_path = DB::table('pictures')->where
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
       
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
}
