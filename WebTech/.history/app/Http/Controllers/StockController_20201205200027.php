<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use Illuminate\Support\Facades\DB;
use App\Models\Color;

class StockController extends Controller
{
    public function add(){
        $request=request();
        error_log($request);
        $stock=new ProductSizeColor;
        $color_id=$request->color_name;
        if ($request->custom==false){
            $color=new Color;
            $color->color_name=$request->picked_color_name;
            $color->color_code=$request->picked_color_code;
            $color->save();
            $color_id=$color->id;
        }
        $stock->count=$request->count;
        $stock->product_id=$request->prod_id;
        $stock->size_id=$request->size_id;
        $stock->color_id=$color_id;
        $stock->save();
        
    }

    public function list($page) {  
        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);
            
        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');
        $sortBy = 'products_sizes_colors'.$sortBy;
        // get descending from query parameters (after ?), if not set => false 
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';
        
        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products_sizes_colors')->join('sizes','sizes.id','products_sizes_colors.size_id')
            ->join('colors','colors.id','products_sizes_colors.color_id')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;
              
            // load products from DB
            $products = DB::table('products_sizes_colors')->join('sizes','sizes.id','products_sizes_colors.size_id')
            ->join('colors','colors.id','products_sizes_colors.color_id')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products_sizes_colors')->count();
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
}
