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
        ->where([['pictures.carousel_num',1]])
        ->limit(4)->get();

        $products2=new Product;
        $products2=$products2->select(DB::raw('products.*,pictures.picture_path'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->where([['pictures.carousel_num',1]])
        ->offset(4)
        ->limit(4)->get();

        return view('landing',['produkty'=>$products, 'produkty2'=>$products2]);

    }
}
