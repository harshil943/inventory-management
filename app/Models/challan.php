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
        'total_no_packages',
        'item_details',
        'bundle',
        'pack_size',
    ];
}
