<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'employee_details';

    protected $fillable =[
        'employee_name',
        'email_id',
        'mobile_number',
        'residence_address',
        'bank_name',
        'bank_account_number',
        'bank_IFSC_code',
        'salary',
    ];
}
