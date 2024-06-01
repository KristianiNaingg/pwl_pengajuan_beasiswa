<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'polling';
    protected $fillable = [
        'id_polling',
        'nama_polling',
        'tgl_buka',
        'tgl_tutup',
    ];


    protected $primaryKey = 'id_polling';

    public function matkuls()
    {
        return $this->belongsToMany(Matakuliah::class, 'polling_detail');
    }


}
