<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblmahasiswa
 *
 * @property int $mahasiswa_id
 * @property int $user_id
 * @property int $jurusan_id
 * @property string $provinsi_id
 * @property string $kota_id
 * @property string $nim
 * @property string $nik
 * @property string $nama
 * @property string $tahun_ajaran
 * @property string $alamat
 * @property string $nohp
 * @property string $email
 * @property string $gender
 * @property int $is_approved
 * @property int $is_lulus
 * @property string $tahun_lulus
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tbluser $tbluser
 * @property \App\Models\Tbljurusan $tbljurusan
 * @property \App\Models\tblkota $tblkota
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_mhs
 * @property \App\Models\TbllowonganMhsDoc $tbllowongan_mhs_doc
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_requests
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_skills
 *
 * @package App\Models
 */
class Tblmahasiswa extends Eloquent
{
	protected $table = 'tblmahasiswa';
	protected $primaryKey = 'mahasiswa_id';
	public $incrementing = false;

	protected $casts = [
		'mahasiswa_id' => 'int',
		'user_id' => 'int',
		'jurusan_id' => 'int',
		'is_approved' => 'int',
		'is_lulus' => 'int'
	];

	protected $fillable = [
		'user_id',
		'jurusan_id',
		'provinsi_id',
		'kota_id',
		'nim',
		'nik',
		'nama',
		'tahun_ajaran',
		'alamat',
		'nohp',
		'email',
		'gender',
		'is_approved',
		'is_lulus',
		'tahun_lulus'
	];

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}

	public function tbljurusan()
	{
		return $this->belongsTo(\App\Models\Tbljurusan::class, 'jurusan_id');
	}

	public function tblkota()
	{
		return $this->belongsTo(\App\Models\tblkota::class, 'kota_id');
	}

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'provinsi_id');
	}

	public function tbllowongan_mhs()
	{
		return $this->hasMany(\App\Models\TbllowonganMh::class, 'mahasiswa_id');
	}

	public function tbllowongan_mhs_doc()
	{
		return $this->hasOne(\App\Models\TbllowonganMhsDoc::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_requests()
	{
		return $this->hasMany(\App\Models\TblmahasiswaRequest::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_skills()
	{
		return $this->hasMany(\App\Models\TblmahasiswaSkill::class, 'mahasiswa_id');
	}
}
