<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaliSubscription extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'mail_subscription';

    protected $fillable =[
        'subscriber_mail',
    ];
}
