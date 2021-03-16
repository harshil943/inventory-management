<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_details';

    protected $fillable =[
        'id',
        'e_way_bill_number',
        'buyer_order_number',
        'product_id',
        'hsn_code',
        'quantity',
        'unit',
        'price_per_piece',
        'name_of_extra_cost',
        'extra_hsn_code',
        'extra_cost_price',
        'igst_applicable',
        'gst_percentage',
        'payment_link',
    ];


}
