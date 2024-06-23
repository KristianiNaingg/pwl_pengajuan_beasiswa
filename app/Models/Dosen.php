<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';

    protected $fillable =[
        'id_dosen',
        'nama_dosen',
        'jabatan',
    ];

    // Di model Dosen
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }


}
