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

    
}
