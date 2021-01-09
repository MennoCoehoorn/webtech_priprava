<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    function pictures($p_path){
        $img = Image::make($p_path);
        $path_array;
        if(strpos($p_path,".png")!= false){
            $p_path=chop($p_path,".png");
            $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save("{$p_path}-bg.png");
            $path_array['picture_path_bg'] = "{$p_path}-bg.png";
            $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save("{$p_path}-md.png");
            $path_array['picture_path_md'] = "{$p_path}-md.png";
        }else{
            $p_path=chop($p_path,".jpg");
            $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save("{$p_path}-bg.jpg");
            $path_array['picture_path_bg'] = "{$p_path}-bg.jpg";
            $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save("{$p_path}-md.jpg");
            $path_array['picture_path_md'] = "{$p_path}-md.jpg";
        }

    return $path_array;
}


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
