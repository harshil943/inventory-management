<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class quoteDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'quote_details';

    protected $fillable = [
        'company_name',
        'email',
        'contact_number',
        'select_product_size',
        'quantity_needed',
    ];
}
