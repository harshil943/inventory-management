<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MachineErrorReportTable extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'machine_error_report';

    protected $fillable =[
        'id',
        'asset_id',
        'error_detail',
        'error_issue_date',
        'error_solve_date',
        'error_status',
        'cost',
    ];
}
