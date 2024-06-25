<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    
    
    protected $table = 'timeline_beasiswa';
    protected $primaryKey = 'id_periode';
    protected $fillable = [
       
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',

        
    ];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }
}
