<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
  
    use HasFactory;
    protected $table = 'polling_detail';

    protected $fillable =[
        'id_detail',
        'status_pemilihan',
       

    ];
    protected $primaryKey='id_detail';

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'id_matkul', );
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'id_polling', );
    }
    
}