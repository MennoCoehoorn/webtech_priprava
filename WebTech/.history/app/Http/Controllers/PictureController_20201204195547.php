<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function list($page) {  
        
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
}
