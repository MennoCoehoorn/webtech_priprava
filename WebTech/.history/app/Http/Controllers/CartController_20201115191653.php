<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use App\Models\Color;
use App\Models\Order;
use App\Models\SubOrder;
use App\Models\Size;

class CartController extends Controller
{
    public function add(Request $request){
        //dd($request->all()); 
        $session_id = $request->session()->getId();
        $color_id=Color::select('id')->where([['color_code',$request->colorHidden]])->first();
        $size_id=Size::select('id')->where([['size_name',$request->sizeHidden]])->first();
        $combo_id=ProductSizeColor::select('id')->where([['product_id',$request->idHidden], 
                                    ['color_id',$color_id->id],['size_id',$size_id->id]])->first();
        $order_id;
        $logged=Auth::user();
            if(isset($logged)){
                $user_id=$logged->id;
                $order_id=Order::select('id')->where([['status_id',1],['user_id',$user_id]])->first();
            }
        $order_id=Order::select('id')->where([['status_id',1],['session_id',$session_id]])->first();
        if (isset($order_id)){
            $duplicates=SubOrder::where([['order_id',$order_id->id],['product_size_color_id',$combo_id->id]])->first();
        }
        else {
            
            $order=new Order;
            $order->status_id=1;
            $order->session_id=$session_id;
            $order->save();
            $order_id = $order->id;
        }
        

        dump($request->idHidden);
        dump($session_id);
        dump($color_id);
        dump($size_id);
        dump($combo_id);
        dump($order_id);
    }
}
