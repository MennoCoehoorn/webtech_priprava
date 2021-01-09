<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function show(){
        $products=new Product;
        $products=$products->select(DB::raw('products.*,pictures.picture_path'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->limit(5);

        return view('landing',['produkty'=>$products]);

    }
}
