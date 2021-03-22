<?php

namespace App\Repositories;

use App\Models\consignee;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\map_order_challan;
use App\Models\ProductDetails;
use App\Models\User;
use App\Repositories\Interfaces\OrderInterface;

class orderRepository implements OrderInterface
{
    public function all()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        if($user->hasRole('super-admin') || $user->hasRole('admin'))
        {
            $data = map_order_challan::select('id','order_date', 'order_id','challan_id','buyer_id','seller_id','consignee_id','order_status','payment_status')->get();
        }
        else
        {
            $data = map_order_challan::where('buyer_id',$user_id)->select('id','order_date','order_id','challan_id','buyer_id','seller_id','consignee_id','order_status','payment_status')->get();
        }
        for($i = 0; $i < sizeof($data); $i++)
        {
            $pi = json_decode($data[$i]->order->product_id,true);
            $q = json_decode($data[$i]->order->quantity,true);
            $arr = array();
            foreach($pi as $id)
            {
                $data2 = DB::table('product_details')
                        ->select('product_name')
                        ->where('id',$id)
                        ->get();

                array_push($arr,$data2[0]->product_name);
            }
            $data[$i]->order->product_id = $arr;
            $data[$i]->order->quantity = $q;
        }
        return $data;
    }

    public function orderDetails($id)
    {
        $data = map_order_challan::where('order_id',$id)->first();

        $pi = json_decode($data->order->product_id,true);
        $hsn = json_decode($data->order->hsn_code,true);
        $q = json_decode($data->order->quantity,true);
        $unit = json_decode($data->order->unit,true);
        $ppp = json_decode($data->order->price_per_piece,true);
        $ex = json_decode($data->order->name_of_extra_cost,true);
        $ehc = json_decode($data->order->extra_hsn_code,true);
        $cp = json_decode($data->order->extra_cost_price,true);
        $arr = array();
        foreach($pi as $id)
        {
            $data2 = DB::table('product_details')
                    ->select('product_name')
                    ->where('id',$id)
                    ->get();

            array_push($arr,$data2[0]->product_name);
        }
        $data->order->product_id = $arr;
        $data->order->hsn_code = $hsn;
        $data->order->quantity = $q;
        $data->order->unit = $unit;
        $data->order->price_per_piece = $ppp;
        $data->order->name_of_extra_cost = $ex;
        $data->order->extra_hsn_code = $ehc;
        $data->order->extra_cost_price = $cp;
        return $data;
    }

    public function buyerDetails()
    {
        $buyer = User::where('is_company','1')->get(['id','name']);
        
        return $buyer;
    }
    public function consigneeDetails()
    {
        
        $consinee = consignee::get(['id','name']);
        return $consinee;
    }
    public function productDetails()
    {
        
        $product = ProductDetails::get(['id','product_name']);
        
        return $product;
    }

    public function orderCreate($requset)
    {
        // dd($requset);
        $order= new OrderDetails;
        
        $order->e_way_bill_number = $requset->e_way_bill_number;
        $order->buyer_order_number = $requset->buyer_order_number;
        $order->product_id = json_encode($requset->product_id);
        $order->hsn_code = json_encode($requset->hsn);
        $order->quantity = json_encode($requset->quantity);
        $order->unit = json_encode($requset->unit);
        $order->price_per_piece = json_encode($requset->price);
        $order->name_of_extra_cost = json_encode($requset->name_of_extra_cost);
        $order->extra_hsn_code = json_encode($requset->extra_hsn_code);
        $order->extra_cost_price = json_encode($requset->extra_cost);
        $order->payment_link = $requset->payment_link;
        if ($requset->igst == null) {
            $order->igst_applicable = '0';
        } else {
            $order->igst_applicable = '1';
        }
        $order->save();
        return true;
    }
}
