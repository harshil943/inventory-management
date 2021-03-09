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
        'product_details',
        'quantity',
        'price_per_piece',
        'name_of_extra_cost',
        'extra_cost_price',
        'payment_link',
        'payment_status',
    ];


}
