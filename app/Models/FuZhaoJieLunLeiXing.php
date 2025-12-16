<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuZhaoJieLunLeiXing extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'TB_FuZhaoJieLunLeiXing';
    protected $primaryKey = 'FZJLLX_ID';
    public $timestamps = false;
}
