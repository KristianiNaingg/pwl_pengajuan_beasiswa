<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'timeline_beasiswa'; #value yang dimasukan adalah nama tabelnya

    protected $fillable = [
        'id_periode',
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    protected $primaryKey = 'id_periode';
}
