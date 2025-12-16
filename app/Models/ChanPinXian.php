<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChanPinXian extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_ChanPinXian';
    protected $primaryKey = 'CPX_ID';
    public $timestamps = false;
}
