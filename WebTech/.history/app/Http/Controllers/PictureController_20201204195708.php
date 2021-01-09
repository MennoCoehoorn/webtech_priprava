<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function list($id) {  
        
        $pictures_path = DB::table('pictures')->where([['product_id',]])
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
       
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
}
