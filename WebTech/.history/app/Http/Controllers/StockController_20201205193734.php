<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function add(){
        $request=request();
        $stock=new ProductSizeColor;
        if ($request->custom==false){
            $color_name=$request->color_name;
            $
        }
        $stock->count=
        $stock->product_id=
        $stock->size_id=
        $stock->color_id=
        $stock->save();
        error_log($request);
    }
}