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
        'id',
        'employee_id',
        'salary_paid',
        'payment_status',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\EmployeeDetails');
    }
}
