<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuZhaoPiCiCaoZuoJiLu extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_FuZhaoPiCiCaoZuoJiLu';
    protected $primaryKey = 'PCCZJL_ID';
    public $timestamps = false;
}
