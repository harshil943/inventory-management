<?php

namespace App\Repositories;

use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Interfaces\OrderInterface;

class orderRepository implements OrderInterface
{
    public function all()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        if($user->hasRole('super-admin') || $user->hasRole('admin'))
        {   
            $data = DB::table('order_details')
                    ->select('id','user_id','product_id','quantity','order_status','payment_staus')
                    ->get();
            foreach($data as $item)
            {
                $pi = json_decode($item->product_id,true);
                $q = json_decode($item->quantity,true);
                $arr = array();
                foreach($pi as $id)
                {
                    $data2 = DB::table('product_details')
                    ->select('product_name')
                    ->where('id',$id)
                    ->get();
                    
                    array_push($arr,$data2[0]->product_name);
                }
                $item->product_id = $arr;
                $item->quantity = $q;
            }
            return $data;    
        }
        else
        {
            $data = DB::table('order_details')
                    ->select('id','user_id','product_id','quantity','order_status','payment_status')        
                    ->where('order_details.user_id',$user_id)
                    ->get();
            foreach($data as $item)
            {
                $pi = json_decode($item->product_id,true);
                $q = json_decode($item->quantity,true);
                $arr = array();
                foreach($pi as $id)
                {
                    $data2 = DB::table('product_details')
                    ->select('product_name')
                    ->where('id',$id)
                    ->get();
                    
                    array_push($arr,$data2[0]->product_name);
                }
                $item->product_id = $arr;
                $item->quantity = $q;
            }
            return $data;
        }
    }

    public function details($id)
    {
        $details = DB::table('order_details')
                    ->join('users', 'order_details.user_id' , '=' , 'users.id')
                    ->select('order_details.id','users.company_name','users.address','users.gst_number','users.email','users.countryCode','users.mobile','order_details.order_date','order_details.due_date','order_details.product_id','order_details.quantity','order_details.price_per_piece','order_details.name_of_extra_cost','order_details.extra_cost_price')
                    ->where('order_details.id',$id)
                    ->get();

        $bright_detail = DB::table('bright_containers_details')
                    // ->select('name','head_office_address','email','contact_number','gst_number','gst_percentage')
                    ->select('name','head_office_address','contact_number','gst_number','gst_percentage')
                    ->where('name','Bright Containers')
                    ->get();

        foreach($details as $item)
        {
            $pi = json_decode($item->product_id,true);
            $q = json_decode($item->quantity,true);
            $ppp = json_decode($item->price_per_piece,true);
            $ex = json_decode($item->name_of_extra_cost,true);
            $cp = json_decode($item->extra_cost_price,true);
            $arr = array();
            foreach($pi as $id)
            {
                $data2 = DB::table('product_details')
                ->select('product_name')
                ->where('id',$id)
                ->get();
                
                array_push($arr,$data2[0]->product_name);
            }
            $item->product_id = $arr;
            $item->quantity = $q;
            $item->price_per_piece = $ppp;
            $item->name_of_extra_cost = $ex;
            $item->extra_cost_price = $cp;
        }
        return [$details,$bright_detail];
    }
}