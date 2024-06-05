<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_beasiswa'; #value yang dimasukan adalah nama tabelnya

    protected $fillable = [
        'id_pengajuan',
        'NRP',
        'id_jenis_beasiswa',
        'id_periode',
        'ipk_terakhir',
        'semester_pengajuan',
        'status_pengajuan',
        'alasan_ditolak'
    ];

    protected $primaryKey = 'id_pengajuan';
}
