<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function list($page) {  
        
        $pictures = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
       
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
}
