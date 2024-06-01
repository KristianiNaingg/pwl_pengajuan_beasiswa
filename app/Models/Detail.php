<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
  
    use HasFactory;
    protected $table = 'polling_detail'; //Sesuaikan nama tabel jika diperlukan
    protected $primaryKey = 'detail_id'; // Tentukan primary key yang benar

    protected $fillable = ['id_polling', 'id_matkul','status_pemilihan',
];

    
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'users_id','id' );
        // ^ Specify the foreign key column name in the 'polling_detail' table
    }
    
}