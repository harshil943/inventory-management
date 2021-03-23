<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'product_details';

    protected $fillable =[
        'id',
        'category_id',
        'product_name',
        'product_image_name',
        'product_filter_type',
        'product_info_1',
        'product_info_2',
        'extra_info_1',
        'extra_info_2',
        'extra_info_3',
        'extra_info_4',
        'available_sizes',
        'available_color_bottle',
        'available_color_cap',
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
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }
}
