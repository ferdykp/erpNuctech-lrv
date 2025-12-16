<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeiTuoDan extends Model
{
    protected $connection = 'sqlsrv';   // gunakan koneksi SQL Server
    protected $table = 'TB_WeiTuoDan';  // nama tabel
    protected $primaryKey = 'WTD_ID';   // primary key tabel
    public $timestamps = false;         // jika tabel tidak punya created_at, updated_at
}
