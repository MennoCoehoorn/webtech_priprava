<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        dd($request->all()); 
        $session_id = $req->session()->getId();
        $color_id=Color::select('id')->where('color_code',$request->colorHidden)->first();
        $size_id=Color::select('id')->where('size_name',$request->sizeHidden)->first();
        $combo_id=ProductSizeColor::select('id')->where([['product_id',$request->idHidden], 
                                    ['color_id',$color_id],['size_id',$size_id]])->first();
        $order_id=Order::select('id')->where(['status_id',1],['session_id',$session_id])->first();
        $duplicates=SubOrder::where([['order_id',$order_id],['product_size_color_id',$combo_id]])->first();
        dump($session_id);
        dump($color_id);
        dump($size_id);
        dump($combo_id);
        dump($order_id);
    }
}
