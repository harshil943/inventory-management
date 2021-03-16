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
        'id',
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
        'dipatch_method',
        'dispatch_document_number',
        'lr_number',
        'order_date',
        'due_date',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\OrderDetails');
    }
    public function challan()
    {
        return $this->belongsTo('App\Models\challan');
    }
    public function buyer()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function seller()
    {
        return $this->belongsTo('App\Models\brightContainersDetails');
    }
    public function consignee()
    {
        return $this->belongsTo('App\Models\consignee');
    }
}
