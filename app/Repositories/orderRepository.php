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
                return DB::table('order_details')
                        ->join('product_details', 'order_details.product_id', '=','product_details.id')
                        ->select('order_details.id','product_details.product_name','order_details.quantity','order_details.order_status','order_details.payment_status')
                        ->get();
        }
        else
        {
            $user_id = Auth::user()->id;
            return DB::table('order_details')
                    ->join('product_details', 'order_details.product_id', '=','product_details.id')
                    ->select('order_details.id','product_details.product_name','order_details.quantity','order_details.order_status','order_details.payment_status')
                    ->where('order_details.user_id',$user_id)
                    ->get();
        }
    }
}