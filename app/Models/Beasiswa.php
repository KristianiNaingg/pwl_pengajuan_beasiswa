<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{


    use HasFactory;
    protected $table = 'beasiswa';
    protected $fillable = [
        'id_beasiswa',
        'nama_beasiswa',
        'deskripsi',
        'id_jenis_beasiswa',
        'id_periode'
    ];

    public function jenisbeasiswa()
    {
        return $this->belongsTo(Jenisbeasiswa::class, 'id_jenis_beasiswa');
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class, 'id_periode');
    }
}
