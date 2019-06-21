<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblperusahaan
 *
 * @property int $perusahaan_id
 * @property int $user_id
 * @property string $city_id
 * @property string $prov_id
 * @property string $nama
 * @property string $alamat
 * @property string $nohp
 * @property string $email
 * @property int $is_approved
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tbluser $tbluser
 * @property \App\Models\Tblkota $tblkota
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
	public $incrementing = false;

	protected $casts = [
		'perusahaan_id' => 'int',
		'user_id' => 'int',
		'is_approved' => 'int'
	];

	protected $fillable = [
		'user_id',
		'city_id',
		'prov_id',
		'nama',
		'alamat',
		'nohp',
		'email',
		'is_approved'
	];

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}

	public function tblkota()
	{
		return $this->belongsTo(\App\Models\Tblkota::class, 'city_id');
	}

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tbllowongan()
	{
		return $this->hasMany(\App\Models\Tbllowongan::class, 'perusahaan_id');
	}

	public function tblperusahaan_request()
	{
		return $this->hasMany(\App\Models\TblperusahaanRequest::class, 'perusahaan_id');
	}
}
