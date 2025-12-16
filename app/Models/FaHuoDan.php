<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaHuoDan extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_FaHuoDan';
    protected $primaryKey = 'FHD_ID';
    public $timestamps = false;
}
