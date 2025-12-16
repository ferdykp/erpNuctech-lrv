<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CangKuJiBenXinXi extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_CangKuJiBenXinXi';
    protected $primaryKey = 'CKJBXX_ID';
    public $timestamps = false;         // jika tabel tidak punya created_at, updated_at
}
