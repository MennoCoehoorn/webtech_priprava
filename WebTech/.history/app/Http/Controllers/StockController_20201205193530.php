<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function add(){
        $request=request();
        $stock=new ProductSize
        error_log($request);
    }
}
