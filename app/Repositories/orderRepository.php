<?php

namespace App\Repositories;

use App\Events\ordermail;
use App\Models\consignee;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\map_order_challan;
use App\Models\ProductDetails;
use App\Models\User;
use App\Models\challan;
use App\Repositories\Interfaces\OrderInterface;
use Database\Seeders\MapOrderChallanSeeder;
use Illuminate\Support\Facades\Mail;

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
            $data = map_order_challan::where('buyer_id',$user_id)->select('id','order_id','challan_id','buyer_id','seller_id','consignee_id','order_status','payment_status')->get();
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

    public function orderDetails($id,$type)
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
                    ->first();
            array_push($arr,$data2->product_name);
        }
        $data->order->product_id = $arr;
        $data->order->hsn_code = $hsn;
        $data->order->quantity = $q;
        $data->order->unit = $unit;
        $data->order->price_per_piece = $ppp;
        $data->order->name_of_extra_cost = $ex;
        $data->order->extra_hsn_code = $ehc;
        $data->order->extra_cost_price = $cp;
        if($type)
        {
            switch($type)
            {
                case(0):
                    $data['type_of_copy'] = '';
                    break;

                case(1):
                    $data['type_of_copy'] = 'Original for Buyer';
                    break;

                case(2):
                    $data['type_of_copy'] = 'Duplicate for Transporter';
                    break;

                case(3):
                    $data['type_of_copy'] = 'Triplicate for Supplier';
                    break;

                case(4):
                    $data['type_of_copy'] = 'Extra Copy';
                    break;
            }
        }
        else
        {
            $data['type_of_copy'] = null;
        }
        return $data;
    }

    public function challanDetails($id)
    {
        $data = map_order_challan::where('challan_id',$id)->first();

        $pi = json_decode($data->challan->product_id,true);
        $cap = json_decode($data->challan->is_cap,true);
        $color = json_decode($data->challan->color,true);
        $bundle = json_decode($data->challan->bundle,true);
        $pack_size = json_decode($data->challan->pack_size,true);
        $arr = array();
        foreach($pi as $id)
        {
            $data2 = DB::table('product_details')
                    ->select('product_name')
                    ->where('id',$id)
                    ->first();
            array_push($arr,$data2->product_name);
        }
        $data->challan->product_id = $arr;
        $data->challan->is_cap = $cap;
        $data->challan->color = $color;
        $data->challan->bundle = $bundle;
        $data->challan->pack_size = $pack_size;
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
        $map = new map_order_challan;
        $order = new OrderDetails;
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
        $map->order_id = $order->id;
        $map->buyer_id = $requset->buyer_id;
        $map->seller_id = '1';
        $map->consignee_id  = $requset->consignee_id;
        $map->vehical_number = $requset->vehical_number;
        $map->order_status = $requset->order_status;
        $map->payment_status = $requset->payment_status;
        $map->dispatch_method = $requset->dispatch_mathod;
        $map->dispatch_document_number = $requset->dispatch_document_number;
        $map->lr_number = $requset->LR_number;
        $map->shipping_date = $requset->shipping_date;
        $map->order_date = $requset->order_date;
        $map->due_date = $requset->due_date;
        $map->save();
        return true;
    }

    public function challanCreate($id,$requset)
    {
        // dd($requset);

        $challan = new challan;
        $challan->total_no_packages = $requset->total_no_packages;
        $challan->extra_note = $requset->extra_note;
        $challan->product_id = json_encode($requset->product_id);
        $challan->is_cap = json_encode($requset->is_cap);
        $challan->bundle = json_encode($requset->bundle);
        $challan->color = json_encode($requset->color);
        $challan->pack_size = json_encode($requset->pack_size);

        if ($requset->igst == null) {
            $challan->is_cap = json_encode('0');
        } else {
            $challan->is_cap = json_encode('1');
        }
        $challan->save();

        map_order_challan::where('id',$id)->update(array(
            'challan_id' => $challan->id,
        ));
        $buyer_id = map_order_challan::where('id',$id)->firstorfail('buyer_id');
        $user = User::where('id',$buyer_id->buyer_id)->first('email','name');
        event(new ordermail($user));
        return true;
    }

    public function orderDelete($id)
    {
        $order = map_order_challan::where('id',$id)->firstorfail();

        map_order_challan::where('id',$order->id)->forcedelete();
        challan::where('id',$order->challan_id)->forcedelete();
        OrderDetails::where('id',$order->order_id)->forcedelete();
        return true;
    }

    public function challanDelete($id)
    {
        map_order_challan::where('challan_id',$id)->update(array('challan_id' => null));
        challan::where('id',$id)->forcedelete();
        return true;
    }

    public function paymentComplete($id)
    {
        map_order_challan::where('order_id',$id)->update(array(
            'payment_status' => 'completed'
        ));
        return true;
    }

    public function orderById($id)
    {
        return map_order_challan::where('order_id',$id)->firstorfail();
    }


}
