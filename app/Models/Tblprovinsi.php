<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblprovinsi
 *
 * @property string $prov_id
 * @property string $prov_nama
 *
 * @property \Illuminate\Database\Eloquent\Collection $tblkota
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaans
 *
 * @package App\Models
 */
class Tblprovinsi extends Eloquent
{
	protected $table = 'tblprovinsi';
	protected $primaryKey = 'prov_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'prov_nama'
	];

	public function tblkota()
	{
		return $this->hasMany(\App\Models\Tblkota::class, 'prov_id');
	}

	public function tblmahasiswas()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'prov_id');
	}

	public function tblperusahaans()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'prov_id');
	}
}
