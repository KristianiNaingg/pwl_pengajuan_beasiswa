<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NRP';



    protected $fillable = [
        'NRP',
        'nama_lengkap',
        'no_hp',
        'email',
        'status_aktif',
        'angkatan',
        'id_prodi',
        'users_id'
    ];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function user()
{
    return $this->belongsTo(User::class,'users_id');
}
}
