<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; #value yang dimasukan adalah nama tabelnya

    protected $fillable = [
        'NRP',
        'nama_lengkap',
        'tempat_tgl_lahir',
        'jenis_kelamin',
        'no_hp',
        'email',
        'ipk_terakhir',
        'status_aktif',
        'angkatan',
        'id_prodi',
        'users_id',
    ];

    protected $primaryKey = 'NRP';
}
