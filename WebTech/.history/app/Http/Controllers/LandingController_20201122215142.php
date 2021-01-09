<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function show(){
        $products=$products->select(DB::raw('products.*,pictures.picture_path, GROUP_CONCAT(colors.color_code) as col'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->join('sizes','products_sizes_colors.size_id','=','sizes.id')
        ->groupBy('products.id');

        return view('all_products',['produkty'=>$products_get]);

    }
}
