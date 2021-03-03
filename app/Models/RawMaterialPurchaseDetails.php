<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawMaterialPurchaseDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'raw_material_purchase_details';

    protected $fillable =[
        'material_name',
        'quantity',
        'cost_per_quantity',
        
    ];
}
