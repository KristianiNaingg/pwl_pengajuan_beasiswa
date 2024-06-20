<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'jenis_beasiswa'; #value yang dimasukan adalah nama tabelnya

    protected $fillable = [
        'id_jenis_beasiswa',
        'nama_jenis_beasiswa',
    ];

    protected $primaryKey = 'id_jenis_beasiswa';
}
