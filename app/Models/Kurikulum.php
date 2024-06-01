<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;
    protected $table = 'kurikulum';

    protected $fillable =[
        'kurikulum_id',
        'tahun_akademik',
        'semester',
        'aktif',

    ];
    protected $primaryKey='kurikulum_id';
    public function matakuliah(){
        return $this-> hasMany(Matakuliah::class) ;
    }
}
