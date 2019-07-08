<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:15:12 +0000.
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
 * @property string $phone_number
 * @property string $email
 * @property int $is_approved
 * @property string $deskripsi
 * @property string $logo_pic
 * @property string $web
 * @property string $pic_name
 * @property string $pic_phone
 * @property string $pic_email
 * @property string $pic_title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tblkotum $tblkotum
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \App\Models\Tbluser $tbluser
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
		'phone_number',
		'email',
		'is_approved',
		'deskripsi',
		'logo_pic',
		'web',
		'pic_name',
		'pic_phone',
		'pic_email',
		'pic_title'
	];

	public function tblkota()
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

	public function tbllowongan()
	{
		return $this->hasMany(\App\Models\Tbllowongan::class, 'perusahaan_id');
	}

	public function tblperusahaan_request()
	{
		return $this->hasMany(\App\Models\TblperusahaanRequest::class, 'perusahaan_id');
	}
}
