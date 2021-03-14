<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class brightContainersDetails extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'bright_containers_details';

    protected $fillable = [
        'id',
        'name',
        'email',
        'head_office_address',
        'gst_number',
        'pan_number',
        'state_code',
        'contact_number',
        'alternative_contact_number',
        'facebook_link',
        'instagram_link',
        'whatsapp_link',
        'google_business_link',
        'google_maps_link_factory',
        'google_maps_link_office',
        'youtube_link',
        'gst_percentage',
        'logo_name',
    ];

}
