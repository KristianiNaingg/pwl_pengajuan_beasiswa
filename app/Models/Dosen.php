<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';

    protected $fillable =[
        'id_dosen',
        'nama_dosen',
        'jabatan',
    ];

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
