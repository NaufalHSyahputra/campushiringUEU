<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblperusahaan
 *
 * @property int $perusahaan_id
 * @property int $user_id
 * @property string $kota_id
 * @property string $prov_id
 * @property string $nama
 * @property string $alamat
 * @property string $nohp
 * @property string $email
 * @property int $is_approved
 * @property string $deskripsi
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tbluser $tbluser
 * @property \App\Models\tblkota $tblkota
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongans
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaan_requests
 *
 * @package App\Models
 */
class Tblperusahaan extends Eloquent
{
	protected $table = 'tblperusahaan';
	protected $primaryKey = 'perusahaan_id';

	protected $casts = [
		'user_id' => 'int',
		'is_approved' => 'int'
	];

	protected $fillable = [
		'user_id',
		'kota_id',
		'prov_id',
		'nama',
		'alamat',
		'nohp',
		'email',
		'is_approved',
		'deskripsi'
	];

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}

	public function tblkota()
	{
		return $this->belongsTo(\App\Models\tblkota::class, 'kota_id');
	}

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tbllowongans()
	{
		return $this->hasMany(\App\Models\Tbllowongan::class, 'perusahaan_id');
	}

	public function tblperusahaan_requests()
	{
		return $this->hasMany(\App\Models\TblperusahaanRequest::class, 'perusahaan_id');
	}
}
