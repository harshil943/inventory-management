<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class challan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'challan_details';

    protected $fillable = [
        'id',
        'total_no_packages',
        'product_id',
        'is_cap',
        'color',
        'bundle',
        'pack_size',
        'extra_note',
    ];
}
