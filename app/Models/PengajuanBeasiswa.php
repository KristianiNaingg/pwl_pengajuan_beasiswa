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
        'status_pengajuan',
        'semester_pengajuan',
        'alasan_ditolak',
        'transkrip_nilai',
        'surat_rekomendasi',
        'surat_pernyataan',
        'surat_keaktifan',
        'surat_keterangan',
        'id_periode',
        'id_beasiswa',
        'NRP',
    ];

    protected $primaryKey = 'id_pengajuan';
}
