<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTableDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'product_table_details';

    protected $fillable =[
        'table_header',
        'brimful_capacity',
        'height',
        'length',
        'thickness',
        'label_height',
        'neck_id',
        'standard_weight',
        'MOQ',
        'cap_name',
    ];
}
