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

            $img->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(300, 400, 'center', false, array(255, 255, 255, 0));
            $img->save("{$p_path}-xs.png");
            $path_array['picture_path_xs'] = "{$p_path}-xs.png";



            $img->resize(285, 400, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(285, 400, 'center', false, array(255, 255, 255, 0));
            $img->save("{$p_path}-lg.png");
            $path_array['picture_path_lg'] = "{$p_path}-lg.png";

            $img->resize(270, 400, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(270, 400, 'center', false, array(255, 255, 255, 0));
            $img->save("{$p_path}-s.png");
            $path_array['picture_path_s'] = "{$p_path}-s.png";

            $img->resize(240, 300, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(240, 300, 'center', false, array(255, 255, 255, 0));
            $img->save("{$p_path}-md.png");
            $path_array['picture_path_md'] = "{$p_path}-md.png";
        }else{
            $p_path=chop($p_path,".jpg");
            $img->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(300, 400, 'center', false, array(255, 255, 255, 100));
            $img->save("{$p_path}-xs.jpg");
            $path_array['picture_path_xs'] = "{$p_path}-xs.jpg";



            $img->resize(285, 400, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(285, 400, 'center', false, array(255, 255, 255, 100));
            $img->save("{$p_path}-lg.jpg");
            $path_array['picture_path_lg'] = "{$p_path}-lg.jpg";

            $img->resize(270, 400, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(270, 400, 'center', false, array(255, 255, 255, 100));
            $img->save("{$p_path}-s.jpg");
            $path_array['picture_path_s'] = "{$p_path}-s.jpg";

            $img->resize(240, 300, function ($constraint) {
                $constraint->aspectRatio();
                
            });
            $img->resizeCanvas(240, 300, 'center', false, array(255, 255, 255, 100));
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

        foreach($products as $prod){
            $prod->picture_path=$this->pictures($prod->picture_path);
            
            }

        $products2=new Product;
        $products2=$products2->select(DB::raw('products.*,pictures.picture_path'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->where([['pictures.carousel_num',1]])
        ->offset(4)
        ->limit(4)->get();

        foreach($products2 as $prod){
            $prod->picture_path=$this->pictures($prod->picture_path);
            
            }

        return view('landing',['produkty'=>$products, 'produkty2'=>$products2]);

    }
}
