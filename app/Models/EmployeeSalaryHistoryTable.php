<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSalaryHistoryTable extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'employee_salary_history';

    protected $fillable =[
        'salary_paid',
        'payment_status',
    ];
}
