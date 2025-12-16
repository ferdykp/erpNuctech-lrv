<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillNOKey extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_BillNOKey';
    protected $primaryKey = 'BNK_ID';
    public $timestamps = false;
}
