<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillCreateRule extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_BillCreateRule';
    protected $primaryKey = 'BCRU_ID';
    public $timestamps = false;         // jika tabel tidak punya created_at, updated_at
}
