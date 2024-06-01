<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'id_matkul',
        'kode_matkul',
        'nama_matkul',
        'sks',
        'kurikulum_id',
    ];
    protected $primaryKey='id_matkul';

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'kurikulum_id');

    }

    public function prodi()
    {
    
        return $this->belongsToMany(Prodi::class, 'id_detail', 'id_matkul', 'id_polling');
    }
    

}
