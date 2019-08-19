<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Aug 2019 05:29:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblmahasiswa
 * 
 * @property int $mahasiswa_id
 * @property int $user_id
 * @property int $fakultas_id
 * @property int $jurusan_id
 * @property string $prov_id
 * @property string $kota_id
 * @property int $is_approved
 * @property int $is_lulus
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Tblfakulta $tblfakulta
 * @property \App\Models\Tbljurusan $tbljurusan
 * @property \App\Models\Tblkotum $tblkotum
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \App\Models\Tbluser $tbluser
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_mhs
 * @property \App\Models\TblmahasiswaDetail $tblmahasiswa_detail
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_docs
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_requests
 *
 * @package App\Models
 */
class Tblmahasiswa extends Eloquent
{
	protected $table = 'tblmahasiswa';
	protected $primaryKey = 'mahasiswa_id';

	protected $casts = [
		'user_id' => 'int',
		'fakultas_id' => 'int',
		'jurusan_id' => 'int',
		'is_approved' => 'int',
		'is_lulus' => 'int'
	];

	protected $fillable = [
		'user_id',
		'fakultas_id',
		'jurusan_id',
		'prov_id',
		'kota_id',
		'is_approved',
		'is_lulus'
	];

	public function tblfakulta()
	{
		return $this->belongsTo(\App\Models\Tblfakulta::class, 'fakultas_id');
	}

	public function tbljurusan()
	{
		return $this->belongsTo(\App\Models\Tbljurusan::class, 'jurusan_id');
	}

	public function tblkotum()
	{
		return $this->belongsTo(\App\Models\Tblkotum::class, 'kota_id');
	}

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}

	public function tbllowongan_mhs()
	{
		return $this->hasMany(\App\Models\TbllowonganMh::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_detail()
	{
		return $this->hasOne(\App\Models\TblmahasiswaDetail::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_docs()
	{
		return $this->hasMany(\App\Models\TblmahasiswaDoc::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_requests()
	{
		return $this->hasMany(\App\Models\TblmahasiswaRequest::class, 'mahasiswa_id');
	}
}
