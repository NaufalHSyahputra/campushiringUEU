<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class tblkota
 *
 * @property string $kota_id
 * @property string $prov_id
 * @property string $kota_name
 *
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \App\Models\TbllowonganDetil $tbllowongan_detil
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaans
 *
 * @package App\Models
 */
class Tblkota extends Eloquent
{
    protected $primaryKey = 'kota_id';
    protected $table = 'tblkota';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'prov_id',
		'kota_name'
	];

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tbllowongan_detil()
	{
		return $this->hasOne(\App\Models\TbllowonganDetil::class, 'kota_id');
	}

	public function tblmahasiswas()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'kota_id');
	}

	public function tblperusahaans()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'kota_id');
	}
}
