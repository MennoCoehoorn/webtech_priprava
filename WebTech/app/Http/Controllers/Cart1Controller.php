<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use App\Models\SubOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSizeColor;
use App\Models\Color;
use App\Models\Size;
use App\Models\Picture;

class List_Entry{
    public $product_name;
    public $product_price;
    public $color;
    public $size;
    public $price_total;
    public $quantity;
    public $picture_path_bg;
    public $picture_path_md;
    public $sub_id;
    public $max_count;
}

class Cart1Controller extends Controller
{
    public function index(Request $req){
        $logged_user = Auth::user();

        if($logged_user!=NULL){
            $user_id = $logged_user->id;
            $order = Order::where('user_id',$user_id)->where('status_id',1)->get();
        }else{
            $session_id = $req->session()->getId();
            $order = Order::where('session_id',$session_id)->where('status_id',1)->get();
        }
        //info($order[0]->id);
        $total_q = 0;
        $total_p = 0.0;
        $list_entries = [];

        if(count($order)>0){
            $suborders = SubOrder::where('order_id', $order[0]->id)->get();

            foreach($suborders as $sub){
                $p_s_c = ProductSizeColor::where('id',$sub->product_size_color_id)->get();
                $color = Color::where('id',$p_s_c[0]->color_id)->get();
                $size = Size::where('id',$p_s_c[0]->size_id)->get();
                $product = Product::where('id',$p_s_c[0]->product_id)->get();
                $picture = Picture::where('product_id',$p_s_c[0]->product_id)->where('carousel_num',1)->get();
                $total_q = $total_q + $sub->quantity;
                $total_p = $total_p + $sub->price_total;
                $entry = new List_Entry();
                $entry->max_count = $p_s_c[0]->count;
                $entry->product_name = $product[0]->name;
                $entry->product_price = $product[0]->price;
                $entry->color = $color[0]->color_name;
                $entry->size = $size[0]->size_name;
                $entry->price_total = $sub->price_total;
                $entry->quantity = $sub->quantity;
                $entry->sub_id = $sub->id;

                $p_path=$picture[0]->picture_path;
                info($p_path);
                $img = Image::make($p_path);
                if(strpos($p_path,".png")!= false){
                    $p_path=chop($p_path,".png");
                    $img->resize(200,200);
                    $img->save("{$p_path}-bg.png");
                    $entry->picture_path_bg = "{$p_path}-bg.png";
                    $img->resize(150,150);
                    $img->save("{$p_path}-md.png");
                    $entry->picture_path_md = "{$p_path}-md.png";
                }else{
                    $p_path=chop($p_path,".jpg");
                    $img->resize(200,200);
                    $img->save("{$p_path}-bg.jpg");
                    $entry->picture_path_bg = "{$p_path}-bg.jpg";
                    $img->resize(150,150);
                    $img->save("{$p_path}-md.jpg");
                    $entry->picture_path_md = "{$p_path}-md.jpg";
                }


                array_push($list_entries,$entry);
            }
            return view('cart_1',['entries' => $list_entries,
                              'total_quantity'=>$total_q,
                              'total_price'=>$total_p,
                              'order_id'=>$order[0]->id]);
        }
        return view('cart_1',['entries' => $list_entries,
                              'total_quantity'=>$total_q,
                              'total_price'=>$total_p,
                              'order_id'=>$order]);

        
    }

    public function destroy_sub($id){
        SubOrder::destroy($id);
        
        return redirect('cart1');
    }

    public function update_quant(Request $req){
        $sub = SubOrder::find($req->id);
        $sub->quantity=$req->quant;
        $p_s_c = ProductSizeColor::find($sub->product_size_color_id);
        $product = Product::find($p_s_c->product_id);
        $sub->price_total = $req->quant * $product->price;
        $sub->save();
        return redirect('cart1');
    }
}
