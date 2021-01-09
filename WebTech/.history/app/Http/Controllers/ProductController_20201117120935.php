<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSizeColor;
use App\Models\Color;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Eloquent\Builder;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function pictures($p_path){
                $img = Image::make($p_path);
                $path_array;
                if(strpos($p_path,".png")!= false){
                    $p_path=chop($p_path,".png");
                    $img->resize(200,200);
                    $img->save("{$p_path}-bg.png");
                    $path_array->picture_path_bg = "{$p_path}-bg.png";
                    $img->resize(150,150);
                    $img->save("{$p_path}-md.png");
                    $path_array->picture_path_md = "{$p_path}-md.png";
                }else{
                    $p_path=chop($p_path,".jpg");
                    $img->resize(200,200);
                    $img->save("{$p_path}-bg.jpg");
                    $path_array->picture_path_bg = "{$p_path}-bg.jpg";
                    $img->resize(150,150);
                    $img->save("{$p_path}-md.jpg");
                    $path_array->picture_path_md = "{$p_path}-md.jpg";
                }

            return $path_array;
    }

    public function search(){
        $order=request('order');
        $sort=request('sort');
        $request=request();
        $searchtext=$_GET['query'];
        $my_query=Product::query();
        $orderBy=[];
        
        $whereBetween=[];
        $products=new Product;
        $products=$products->select(DB::raw('products.*,pictures.picture_path, GROUP_CONCAT(colors.color_code) as col'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->join('sizes','products_sizes_colors.size_id','=','sizes.id');
        

        foreach ($request->query() as $key=>$value)
        {
            if($key=='order' || $key=='sort'){
                array_push($orderBy,$value);
                
            }
           
           else if($key=='price'){
            //array_push($whereBetween,[$key,explode(',',$value)]);
            $products=$products->whereBetween('price',explode(',',$value));
           }
           else if($key!='page' && $key!='query' && $key!='_token') {
            //array_push($where,[$key,explode(',',$value)]);
            $products=$products->whereIn($key,explode(',',$value));
           }
        }
        
        

        $products=$products->where(function ($query) use ($searchtext){
            $query->where([['products.name','like', '%'.$searchtext.'%']])
                  ->orWhere([['products.description','like', '%'.$searchtext.'%']]);})
        ->groupBy('products.id');

        if(!empty($orderBy)){
            $products=$products->orderBy($orderBy[0],$orderBy[1]);
        }
        DB::enableQueryLog();
       
        $products_get=$products->paginate(16);//get();
        dump(DB::getQueryLog());


        $allcolors=Color::select('color_name')->get();
        $allcollections=Product::select('collection')->groupBy('collection')->get();
        $price=Product::select(DB::raw('MIN(price) as min, MAX(price) as max'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->where([['products.name','like', '%'.$searchtext.'%']])
        ->orWhere([['products.description','like', '%'.$searchtext.'%']])->first();
        error_log($price); 

        foreach($products_get as $prod){
        $prod->picture_path=$this.pictures($prod->picture_path);
        }
               

        return view('all_products',['produkty'=>$products_get, 'price'=>$price, 'allcolors'=>$allcolors, 'allcollections'=>$allcollections]);
    }



    public function index($gender,$category){
        $order=request('order');
        $sort=request('sort');
        $request=request();
        $my_query=Product::query();
        $orderBy=[];
        $where=[['sex',[$gender,$gender]],['category',[$category,$category]]];
        $whereBetween=[];
        $products=new Product;
        $products=$products->select(DB::raw('products.*,pictures.picture_path, GROUP_CONCAT(colors.color_code) as col'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->join('sizes','products_sizes_colors.size_id','=','sizes.id')
        ->where([['sex',$gender],['category',$category],['carousel_num',1]])
        ->groupBy('products.id');

        foreach ($request->query() as $key=>$value)
        {
            if($key=='order' || $key=='sort'){
                array_push($orderBy,$value);
                
            }
           
           else if($key=='price'){
            //array_push($whereBetween,[$key,explode(',',$value)]);
            $products=$products->whereBetween('price',explode(',',$value));
           }
           else if($key!='page') {
            //array_push($where,[$key,explode(',',$value)]);
            $products=$products->whereIn($key,explode(',',$value));
           }
        }
        
        $allcolors=Color::select('color_name')->get();
        $allcollections=Product::select('collection')->groupBy('collection')->get();

        if(!empty($orderBy)){
            $products=$products->orderBy($orderBy[0],$orderBy[1]);
        }
        DB::enableQueryLog();
        $products_get=$products->paginate(16);//get();
       
        foreach($products_get as $prod){
            $prod->picture_path=$this.pictures($prod->picture_path);
            }
/*
        if(!empty($orderBy) && !empty($whereBetween)){
            error_log("good");
            DB::enableQueryLog();
            $products=Product::select(DB::raw('products.*, pictures.*, GROUP_CONCAT(colors.color_code) as col'))
            ->join('pictures', 'products.id', '=', 'pictures.product_id')
            ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
            ->join('colors','products_sizes_colors.color_id','=','colors.id')
            ->whereIn($where)
            ->whereBetween($whereBetween)
            ->groupBy('products.id')
            ->orderBy($orderBy);

            error_log($products);

        }; 

        if(!empty($orderBy) && empty($whereBetween)){

            $products=Product::select(DB::raw('products.*, pictures.*, GROUP_CONCAT(colors.color_code) as col'))
            ->join('pictures', 'products.id', '=', 'pictures.product_id')
            ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
            ->join('colors','products_sizes_colors.color_id','=','colors.id')
            ->whereIn($where)
            ->groupBy('products.id')
            ->orderBy($orderBy)->get();

        };

        if(empty($orderBy) && !empty($whereBetween)){

            $products=Product::select(DB::raw('products.*, pictures.*, GROUP_CONCAT(colors.color_code) as col'))
            ->join('pictures', 'products.id', '=', 'pictures.product_id')
            ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
            ->join('colors','products_sizes_colors.color_id','=','colors.id')
            ->whereIn($where)
            ->whereBetween($whereBetween)
            ->groupBy('products.id')->get();

        };

        if(empty($orderBy) && empty($whereBetween)){

            $products=Product::select(DB::raw('products.*, pictures.*, GROUP_CONCAT(colors.color_code) as col'))
            ->join('pictures', 'products.id', '=', 'pictures.product_id')
            ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
            ->join('colors','products_sizes_colors.color_id','=','colors.id')
            ->whereIn($where)
            ->groupBy('products.id')->get();

        };





/*

        if(isset($order)){
            $products=Product::select(DB::raw('products.*, pictures.*, GROUP_CONCAT(colors.color_code) as col'))
            ->join('pictures', 'products.id', '=', 'pictures.product_id')
            ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
            ->join('colors','products_sizes_colors.color_id','=','colors.id')
            ->where([['sex',$gender],['category',$category],['carousel_num',1]])
            ->groupBy('products.id')
            ->orderBy('products.'.$order,$sort)->get();
        }
        else {
            $products=Product::select(DB::raw('products.*, pictures.*, GROUP_CONCAT(colors.color_code) as col'))
                        ->join('pictures', 'products.id', '=', 'pictures.product_id')
                        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
                        ->join('colors','products_sizes_colors.color_id','=','colors.id')
                        ->where([['sex',$gender],['category',$category],['carousel_num',1]])
                        ->groupBy('products.id')->get();
        }
           
*/
        $price=Product::select(DB::raw('MIN(price) as min, MAX(price) as max'))
        ->join('pictures', 'products.id', '=', 'pictures.product_id')
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->where([['sex',$gender],['category',$category]])->first();
        error_log($price);
               

        //$products=Product::join('pictures', 'products.id', '=', 'pictures.product_id')->where([['sex',$gender],['category',$category]])->get();
        
        
        //$products=Product::all();
        return view('all_products',['produkty'=>$products_get, 'price'=>$price, 'allcolors'=>$allcolors, 'allcollections'=>$allcollections]);
    }

    public function show($gender,$category,$id){
        $product=Product::where([['id',$id]])->first();
        $pictures=Picture::where([['product_id',$id]])->orderBy('carousel_num','asc')->get();
        $colors=ProductSizeColor::select('color_code','color_name')
                                ->join('colors','products_sizes_colors.color_id','=','colors.id')
                                ->where([['product_id',$id]])->get();
        $sizes=ProductSizeColor::select('size_name')
                                ->join('sizes','products_sizes_colors.size_id','=','sizes.id')
                                ->where([['product_id',$id]])
                                ->groupBy('size_name')->get();
        $stock=ProductSizeColor::select('product_id', 'products_sizes_colors.count as count', 'size_name', 'color_code')
                                ->join('colors','products_sizes_colors.color_id','=','colors.id')
                                ->join('sizes','products_sizes_colors.size_id','=','sizes.id')
                                ->where([['product_id',$id]])->get();
       
        
        return view('product_detail',['product'=>$product, 'pictures'=>$pictures, 'colors'=>$colors, 'sizes'=>$sizes, 'stock'=>$stock]);
    }
}
