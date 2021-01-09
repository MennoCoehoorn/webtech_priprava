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
    public function listall() {
        return Product::all()->toJson(JSON_PRETTY_PRINT);
    }

    public function edit(Product $product)
    {
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $id=$product->id;
        error_log($id);
        $pics=Pictures::
        $product->delete();
        // error handling is up to you!!! ;)
        return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
    }

   
    public function update(Request $request, Product $product)
    {
        // validations and error handling is up to you!!! ;)
        /*
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);  
        */
        $request=request();
        error_log($request);
        $product->name = $request->name;
        $product->price=$request->price;
        $product->material=$request->material;
        $product->category=$request->category;
        $product->description = $request->description;
        $product->collection=$request->collection;
        $product->sex=$request->sex;
        $product->save();
    }

    public function store()
    {
        // validations and error handling is up to you!!! ;)
        /*
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);
        */
        //$productData = json_decode($request);
        $request=request();
        error_log($request);
        $product=new Product;
        $product->name = $request->name;
        $product->price=$request->price;
        $product->material=$request->material;
        $product->category=$request->category;
        $product->description = $request->description;
        $product->collection=$request->collection;
        $product->sex=$request->sex;
        $product->save();
        error_log("prod");
        $id=$product->id;
        error_log($id);
        foreach ($request->pictures as $key=>$pic){
            error_log($pic);
            $picture=Picture::where([['id',$pic]])->first();
            error_log($picture);
            $picture->product_id=$id;
            error_log($key);
            $picture->carousel_num=$key+1;
            $picture->save();
        }
        error_log("pred returnom");
        return response()->json(['id' => $product->id]);
    }
    
    public function list($page) {  
        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);
            
        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');
            
        // get descending from query parameters (after ?), if not set => false 
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';
        
        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;
              
            // load products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

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


    function pictures_carousel($p_path){
        $img = Image::make($p_path);
                $path_array;
                if(strpos($p_path,".png")!= false){
                    $p_path=chop($p_path,".png");

                    $img->resize(730, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(730, 500, 'center', false, array(255, 255, 255, 0));
                    $img->save("{$p_path}-xlg.png");
                    $path_array['picture_path_xlg'] = "{$p_path}-xlg.png";



                    $img->resize(610, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(610, 400, 'center', false, array(255, 255, 255, 0));
                    $img->save("{$p_path}-lg.png");
                    $path_array['picture_path_lg'] = "{$p_path}-lg.png";

                    $img->resize(450, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(450, 400, 'center', false, array(255, 255, 255, 0));
                    $img->save("{$p_path}-md.png");
                    $path_array['picture_path_md'] = "{$p_path}-md.png";

                    $img->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(400, 400, 'center', false, array(255, 255, 255, 0));
                    $img->save("{$p_path}-s.png");
                    $path_array['picture_path_s'] = "{$p_path}-s.png";

                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(300, 300, 'center', false, array(255, 255, 255, 0));
                    $img->save("{$p_path}-xs.png");
                    $path_array['picture_path_xs'] = "{$p_path}-xs.png";
                }else{
                    $p_path=chop($p_path,".jpg");
                    $img->resize(730, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(730, 500, 'center', false, array(255, 255, 255, 100));
                    $img->save("{$p_path}-xlg.png");
                    $path_array['picture_path_xlg'] = "{$p_path}-xlg.png";



                    $img->resize(610, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(610, 400, 'center', false, array(255, 255, 255, 100));
                    $img->save("{$p_path}-lg.jpg");
                    $path_array['picture_path_lg'] = "{$p_path}-lg.jpg";

                    $img->resize(450, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(450, 400, 'center', false, array(255, 255, 255, 100));
                    $img->save("{$p_path}-md.jpg");
                    $path_array['picture_path_md'] = "{$p_path}-md.jpg";

                    $img->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(400, 400, 'center', false, array(255, 255, 255, 100));
                    $img->save("{$p_path}-s.jpg");
                    $path_array['picture_path_s'] = "{$p_path}-s.jpg";

                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        
                    });
                    $img->resizeCanvas(300, 300, 'center', false, array(255, 255, 255, 100));
                    $img->save("{$p_path}-xs.jpg");
                    $path_array['picture_path_xs'] = "{$p_path}-xs.jpg";
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
       
        $products_get=$products->paginate(8);//get();
        


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
        $prod->picture_path=$this->pictures($prod->picture_path);
        $colors=Product::select(DB::raw('GROUP_CONCAT(colors.color_code) as col'))
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->where([['products.id',$prod->id]])->get();
        
        $prod->col=$colors[0]->col;
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
        $products_get=$products->paginate(8);//get();
       
        foreach($products_get as $prod){
            $prod->picture_path=$this->pictures($prod->picture_path);
            $colors=Product::select(DB::raw('GROUP_CONCAT(colors.color_code) as col'))
        ->join('products_sizes_colors','products.id','=','products_sizes_colors.product_id')
        ->join('colors','products_sizes_colors.color_id','=','colors.id')
        ->where([['products.id',$prod->id]])->get();
        
        $prod->col=$colors[0]->col;
            }

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
                                ->where([['product_id',$id]])->groupBy('color_name')->get();
        $sizes=ProductSizeColor::select('size_name')
                                ->join('sizes','products_sizes_colors.size_id','=','sizes.id')
                                ->where([['product_id',$id]])
                                ->groupBy('size_name')->get();
        $stock=ProductSizeColor::select('product_id', 'products_sizes_colors.count as count', 'size_name', 'color_code')
                                ->join('colors','products_sizes_colors.color_id','=','colors.id')
                                ->join('sizes','products_sizes_colors.size_id','=','sizes.id')
                                ->where([['product_id',$id]])->get();
        
        foreach($pictures as $pic){
            $pic->picture_path=$this->pictures_carousel($pic->picture_path);
        }
       
        
        return view('product_detail',['product'=>$product, 'pictures'=>$pictures, 'colors'=>$colors, 'sizes'=>$sizes, 'stock'=>$stock]);
    }
}
