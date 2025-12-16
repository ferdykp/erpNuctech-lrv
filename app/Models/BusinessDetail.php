<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $table = 'business_details';

    protected $fillable = [
        'no_order',
        'status_order',
        'custom_abbrev',
        'total',
        'order_form',
        'appointments',
        'order_type',
        'time_range',
        'arrived',
        'estimate_delivery',
        'release',
        'sales_staff',
        'custom_notes',
        'people_call',
        'reviewer',
        'date_review',
        'people_in',
        'date_in',
        'modified_by',
        'time_modified'
    ];

    protected $casts = ['date_in' => 'datetime'];
}
