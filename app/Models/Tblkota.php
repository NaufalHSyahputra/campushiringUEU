<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:04 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblkota
 *
 * @property string $kota_id
 * @property string $kota_nama
 * @property string $prov_id
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
