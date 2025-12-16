<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWeb extends Model
{
    use HasFactory;

    // Jika nama tabel bukan "client_webs", sesuaikan di sini:
    protected $table = 'client_webs';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'nama',
        'alamat',
        'tanggal',
        'keterangan',
    ];

    // Jika kolom tanggal bernama "tanggal", aktifkan cast ke date
    protected $casts = [
        'tanggal' => 'date',
    ];
}
