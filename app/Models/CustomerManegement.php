<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerManegement extends Model
{
    use HasFactory;

    protected $table = 'customer_manegements';

    protected $fillable = [
        'custom_code',
        'custom_name',
        'custom_abbrev',
        'industry_class',
        'no_telp',
        'seller',
        'fax',
        'email',
        'entry_person',
        'entry_time',
        'isIt_affective'
    ];

    protected $casts = [
        'entry_time' => 'datetime'
    ];
}
