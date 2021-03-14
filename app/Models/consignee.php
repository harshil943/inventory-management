<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class consignee extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'consignee_details';

    protected $fillable = [
        'id',
        'name',
        'email',
        'number',
        'gst_number',
        'state_code',
        'address',
    ];
}
