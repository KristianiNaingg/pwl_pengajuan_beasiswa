<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswa'; #value yang dimasukan adalah nama tabelnya

    protected $fillable = [
        'id_beasiswa',
        'nama_beasiswa',
        'deskripsi',
        'id_jenis_beasiswa',
        'id_periode',
    ];

    protected $primaryKey = 'id_beasiswa';
}
