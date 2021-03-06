<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use Illuminate\Support\Facades\DB;
use App\Models\Color;

class StockController extends Controller
{

    public function edit(ProductSizeColor $stock)
    {
        error_log($stock);
        return response()->json($stock);
    }
    public function destroy(ProductSizeColor $stock)
    {
        $id=$stock->id;
        DB::table('suborders')->where([['products_sizes_colors_id',$]])->count();
        $stock->delete();
        // error handling is up to you!!! ;)
        return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
    }
    public function update(ProductSizeColor $stock)
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
        $color_id=$request->color_name;
        if ($request->custom==false){
            $color=new Color;
            $color->color_name=$request->picked_color_name;
            $color->color_code=$request->picked_color_code;
            $color->save();
            $color_id=$color->id;
        }
        $stock->count=$request->count;
        $stock->product_id=$request->prod_id;
        $stock->size_id=$request->size_id;
        $stock->color_id=$color_id;
        $stock->save();
    }

    public function add(){
        $request=request();
        error_log($request);
        $stock=new ProductSizeColor;
        $color_id=$request->color_name;
        if ($request->custom==false){
            $color=new Color;
            $color->color_name=$request->picked_color_name;
            $color->color_code=$request->picked_color_code;
            $color->save();
            $color_id=$color->id;
        }
        $stock->count=$request->count;
        $stock->product_id=$request->prod_id;
        $stock->size_id=$request->size_id;
        $stock->color_id=$color_id;
        $stock->save();
        
    }

    public function list($page) {  
        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);
            
        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');
        $sortBy = 'products_sizes_colors.'.$sortBy;
        // get descending from query parameters (after ?), if not set => false 
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';
        
        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products_sizes_colors')->select('products_sizes_colors.id as idecko','products.name', 'products_sizes_colors.*', 'sizes.size_name', 'colors.color_name')
            ->join('products','products_sizes_colors.product_id','products.id')
            ->join('sizes','products_sizes_colors.size_id','sizes.id')
            ->join('colors','products_sizes_colors.color_id','colors.id')
                ->orderBy($sortBy, $descending)
                ->orderBy('idecko', 'asc')
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;
              
            // load products from DB
            $products = DB::table('products_sizes_colors')->select('products_sizes_colors.id as idecko','products.name', 'products_sizes_colors.*', 'sizes.size_name', 'colors.color_name')
                ->join('products','products_sizes_colors.product_id','products.id')
                ->join('sizes','products_sizes_colors.size_id','sizes.id')
                ->join('colors','products_sizes_colors.color_id','colors.id')
                ->orderBy($sortBy, $descending)
                ->orderBy('idecko', 'asc')
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
        error_log($products);
      
        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products_sizes_colors')->where([['product_id','!=',NULL]])->count();
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
}
