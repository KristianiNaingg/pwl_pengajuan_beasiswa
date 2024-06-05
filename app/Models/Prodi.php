<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
	protected $table = 'prodi';
	protected $primaryKey = 'id_prodi';



	protected $fillable = [
		'nama_prodi',
		'id_fakultas'
	];

//	public function fakulta()
//	{
//		return $this->belongsTo(Fakulta::class, 'id_fakultas');
//	}
//
//	public function mahasiswas()
//	{
//		return $this->hasMany(Mahasiswa::class, 'id_prodi');
//	}
//
//	public function pengajuan_beasiswas()
//	{
//		return $this->hasMany(PengajuanBeasiswa::class, 'id_prodi');
//	}
}
