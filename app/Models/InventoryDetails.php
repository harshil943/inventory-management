<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'inventory_details';

    protected $fillable =[
        'id',
        'product_id',
        'quantity',
        'cost_per_product',
    ];
}

