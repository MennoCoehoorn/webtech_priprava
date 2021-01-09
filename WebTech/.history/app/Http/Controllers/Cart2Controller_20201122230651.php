<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\DeliveryInfo;
use App\Models\InvoiceInfo;
use App\Models\Order;
use App\Models\SubOrder;
use App\Models\ProductSizeColor;
use App\Models\Payment;
use App\Models\Transport;

class d_info{
    public $name;
    public $surname;
    public $city_state;
    public $postal_code;
    public $address;
    public $phone;
    public $email;
    public $d_info_id;
}

class cart_3_info{
    public $name;
    public $surname;
    public $address1;
    public $address2;
    public $payment;
    public $transport;
    public $date_arrive;
    public $price;
    public $order_id;
}

class Cart2Controller extends Controller
{
    public function index(Request $req){
        $logged_user = Auth::user();
        $d_info = new d_info();

        if($logged_user != NULL){
            $delivery_id = $logged_user->delivery_info_id;
            $delivery_info = DeliveryInfo::find($delivery_id);
            if($delivery_info!=NULL){
                $d_info->name=$delivery_info->name;
                $d_info->surname=$delivery_info->surname;
                $d_info->city_state=$delivery_info->city_state;
                $d_info->postal_code=$delivery_info->postal_code;
                $d_info->address=$delivery_info->address;
                $d_info->phone=$delivery_info->phone;
                $d_info->email=$delivery_info->email;
                $d_info->d_info_id=$delivery_info->id;
            }else{
                $d_info->name="";
                $d_info->surname="";
                $d_info->city_state="";
                $d_info->postal_code="";
                $d_info->address="";
                $d_info->phone="";
                $d_info->email="@";
                $d_info->d_info_id="";
            }
        }else{
                $d_info->name="";
                $d_info->surname="";
                $d_info->city_state="";
                $d_info->postal_code="";
                $d_info->address="";
                $d_info->phone="";
                $d_info->email="@";
                $d_info->d_info_id="";
        }

        if($logged_user!=NULL){
            $user_id = $logged_user->id;
            $order = Order::where('user_id',$user_id)->where('status_id',1)->get();
        }else{
            $session_id = $req->session()->getId();
            $order = Order::where('session_id',$session_id)->where('status_id',1)->get();
        }

        if(sizeof($order)<1){
            return redirect('/cart1')->with('status-bad', "Košík je prázdny");
        }
        
        $suborders = SubOrder::where('order_id', $order[0]->id)->get();
        $total_p = 0.0;

        foreach($suborders as $sub){
            $total_p = $total_p + $sub->price_total;
        }

        return view('cart_2',["d_info"=>$d_info,
                              "total_p"=>$total_p,
                              "order_id"=>$order[0]->id,
                              "user"=>$logged_user]);
    }

    public function order_sent(Request $req){
        if(($req->sameInfoCheck != 1) && (
            ($req->firstnameF == "")||
            ($req->surnameF == "")||
            ($req->cityStateF == "")||
            ($req->postalCodeF == "")||
            ($req->addressF == "")||
            ($req->phoneF == "")||
            ($req->emailF == "")
        )){
            return redirect('/cart2');
        }
        $cart_3_info = new cart_3_info();
        $logged_user = Auth::user();
        $order = Order::find($req->order_id);
        $new_d_info = new DeliveryInfo();
        $new_i_info = new InvoiceInfo();

        $new_d_info->name = $req->firstname;
        $new_d_info->surname = $req->surname;
        $new_d_info->city_state = $req->cityState;
        $new_d_info->postal_code = $req->postalCode;
        $new_d_info->address = $req->address;
        $new_d_info->phone = $req->phone;
        $new_d_info->email = $req->email;
        $new_d_info->save();
        $order->delivery_info_id = $new_d_info->id;
        
        $cart_3_info->name=$new_d_info->name;
        $cart_3_info->surname=$new_d_info->surname;
        $cart_3_info->address1=$new_d_info->address;
        $cart_3_info->address2=$new_d_info->city_state;
        $cart_3_info->price=$req->total_p;

        if($req->sameInfoCheck == 1){
            $new_i_info->name = $req->firstname;
            $new_i_info->surname = $req->surname;
            $new_i_info->city_state = $req->cityState;
            $new_i_info->postal_code = $req->postalCode;
            $new_i_info->address = $req->address;
            $new_i_info->phone = $req->phone;
            $new_i_info->email = $req->email;
            $new_i_info->save();
            $order->invoice_info_id = $new_i_info->id;
        }else{
            $new_i_info->name = $req->firstnameF;
            $new_i_info->surname = $req->surnameF;
            $new_i_info->city_state = $req->cityStateF;
            $new_i_info->postal_code = $req->postalCodeF;
            $new_i_info->address = $req->addressF;
            $new_i_info->phone = $req->phoneF;
            $new_i_info->email = $req->emailF;
            $new_i_info->save();
            $order->invoice_info_id = $new_i_info->id;
        }

        if($logged_user!=NULL){
            $saved_d_info = DeliveryInfo::find($logged_user->delivery_info_id);
            if($saved_d_info != NULL){
                $saved_d_info->name = $req->firstname;
                $saved_d_info->surname = $req->surname;
                $saved_d_info->city_state = $req->cityState;
                $saved_d_info->address = $req->address;
                $saved_d_info->phone = $req->phone;
                $saved_d_info->email = $req->email;
                $saved_d_info->save();        
            }else{
                $logged_user->delivery_info_id=$new_d_info->id;
                $logged_user->save();
            }

        }

        $order->transport_id = $req->transport;
        $order->payment_id = $req->payment;
        $order->comment = $req->comment;
        $order->status_id = 2;

        $ordered_date = Carbon::now();
        $arrive_date = $ordered_date->addDays(7);
        $ordered_date = $ordered_date->toDateString();
        $arrive_date = $arrive_date->toDateString();

        $order->date_ordered = $ordered_date;
        $order->date_to_arrive = $arrive_date;
        $order->save();

        $suborders = SubOrder::where('order_id', $order->id)->get();

        foreach($suborders as $sub){
            $p_s_c = ProductSizeColor::where('id',$sub->product_size_color_id)->get();
            $p_s_c[0]->count = $p_s_c[0]->count - $sub->quantity;
            $p_s_c[0]->save();             
        }

        $transport = Transport::find($order->transport_id);
        $payment = Payment::find($order->payment_id);
        
        $cart_3_info->payment = $payment->type;
        $cart_3_info->transport = $transport->type;
        $cart_3_info->date_arrive = $arrive_date;
        $cart_3_info->order_id = $order->id;

        return view('cart_3',["cart_3_info"=>$cart_3_info]);
    }

}
