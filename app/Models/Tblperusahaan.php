<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblperusahaan
 *
 * @property int $perusahaan_id
 * @property int $user_id
 * @property string $kota_id
 * @property string $nama
 * @property string $prov_id
 * @property int $is_approved
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tblkota $tblkota
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \App\Models\Tbluser $tbluser
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan
 * @property \App\Models\TblperusahaanDetail $tblperusahaan_detail
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaan_request
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
		'nama',
		'prov_id',
		'is_approved'
	];

	public function tblkota()
	{
		return $this->belongsTo(\App\Models\Tblkota::class, 'kota_id');
	}

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}

	public function tbllowongan()
	{
		return $this->hasMany(\App\Models\Tbllowongan::class, 'perusahaan_id');
	}

	public function tblperusahaan_detail()
	{
		return $this->hasOne(\App\Models\TblperusahaanDetail::class, 'perusahaan_id');
	}

	public function tblperusahaan_request()
	{
		return $this->hasMany(\App\Models\TblperusahaanRequest::class, 'perusahaan_id');
	}
}
