<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetDetailsTable extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'asset_details';

    protected $fillable =[
        'id',
        'asset_name',
        'purchase_date',
        'selling_date',
        'asset_amount',
    ];
}
