<?php

namespace App\Repositories;

use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\map_order_challan;

use App\Repositories\Interfaces\OrderInterface;

class orderRepository implements OrderInterface
{
    public function all()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        if($user->hasRole('super-admin') || $user->hasRole('admin'))
        {   
            $data = map_order_challan::select('id','order_date', 'order_id','challan_id','buyer_id','seller_id','consignee_id','order_status','payment_status','consignee_available')->get();
        }
        else
        {
            $data = map_order_challan::where('buyer_id',$user_id)->select('id','order_date','order_id','challan_id','buyer_id','seller_id','consignee_id','order_status','payment_status','consignee_available')->get();
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

        // $details = DB::table('order_details')
        //             ->join('users', 'order_details.user_id','=','users.id')
        //             ->select('order_details.id','users.name','users.address','users.gst_number','users.email','users.countryCode','users.mobile','order_details.order_date','order_details.due_date','order_details.product_id','order_details.quantity','order_details.price_per_piece','order_details.name_of_extra_cost','order_details.extra_cost_price','order_details.payment_link','order_details.payment_status')
        //             ->where('order_details.id',$id)
        //             ->first();

        // $bright_detail = DB::table('bright_containers_details')
        //             ->select('name','head_office_address','email','contact_number','gst_number','gst_percentage')
        //             ->where('name','Bright Containers')
        //             ->first();        

        // $pi = json_decode($details->product_id,true);
        // $q = json_decode($details->quantity,true);
        // $ppp = json_decode($details->price_per_piece,true);
        // $ex = json_decode($details->name_of_extra_cost,true);
        // $cp = json_decode($details->extra_cost_price,true);
        // $arr = array();
        // foreach($pi as $id)
        // {
        //     $data2 = DB::table('product_details')
        //     ->select('product_name')
        //     ->where('id',$id)
        //     ->get();
            
        //     array_push($arr,$data2[0]->product_name);
        // }
        // $details->product_id = $arr;
        // $details->quantity = $q;
        // $details->price_per_piece = $ppp;
        // $details->name_of_extra_cost = $ex;
        // $details->extra_cost_price = $cp;
        return $data;
    }
}