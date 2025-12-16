<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaoZuoRiZhi extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_CaoZuoRiZhi';
    protected $primaryKey = 'CZRZID';
    public $timestamps = false;         // jika tabel tidak punya created_at, updated_at
}
