<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function add(){
        $request=request();
        error_log($request);
        $stock=new ProductSizeColor;
        $color_id=$request->color_name
        if ($request->custom!=false){
            $color_id=Color::where('id',$request->color_name)->first();
            
        }
        $stock->count=
        $stock->product_id=
        $stock->size_id=
        $stock->color_id=
        $stock->save();
        
    }
}
