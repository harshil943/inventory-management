<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactDetails extends Model
{
    use HasFactory;

    protected $table = 'contact_details';

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'company_name',
        'product_category',
        'product_name',
        'query',
    ];
}
