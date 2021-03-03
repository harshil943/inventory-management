<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'expense_details';

    protected $fillable =[
        'expense_details',
        'quantity',
        'cost_per_quantity',
        

    ];
}
