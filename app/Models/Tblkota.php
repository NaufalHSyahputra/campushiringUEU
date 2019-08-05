<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblkotum
 *
 * @property string $kota_id
 * @property string $kota_nama
 * @property string $prov_id
 *
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaans
 *
 * @package App\Models
 */
class Tblkota extends Eloquent
{
	protected $primaryKey = 'kota_id';
	public $incrementing = false;
    public $timestamps = false;
    protected $table = 'tblkota';

	protected $fillable = [
		'kota_nama',
		'prov_id'
	];

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'kota_id');
	}

	public function tblmahasiswa()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'kota_id');
	}

	public function tblperusahaan()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'kota_id');
	}
}
