<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbeasiswa extends Model
{
    use HasFactory;
    
    protected $table = 'jenis_beasiswa';
     protected $primaryKey = 'id_jenis_beasiswa';
    protected $fillable = [
        'id_jenis_beasiswa',
        'nama_jenis_beasiswa',
        
    ];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }

    
}
