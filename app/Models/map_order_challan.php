<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class map_order_challan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'map_order_challan';

    protected $fillable = [
        'order_id',
        'challan_id',
        'buyer_id',
        'seller_id',
        'consignee_available',
        'consignee_id',
        'vehical_number',
        'order_status',
        'payment_status',
        'shipping_date',
        'dispatch_document_number',
        'lr_number',
        'order_date',
    ];
}
