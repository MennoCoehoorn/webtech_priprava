<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    public function show(){
        $products=$products->select(DB::raw('products.*,pictures.picture_path'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->groupBy('products.id');

        return view('landing',['produkty'=>$products]);

    }
}
