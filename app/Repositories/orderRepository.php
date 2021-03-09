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
        if($user->hasRole('super-admin') || $user->hasRole('admin'))
        {
            $user_id = Auth::user()->id;
            $data = DB::table('order_details')->get();
            foreach($data as $item)
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
            return $data;    
        }
        else
        {
            $user_id = Auth::user()->id;
            $data = DB::table('order_details')->where('order_details.user_id',$user_id)->get();
            foreach($data as $item)
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
                return $data;
        }
    }
}