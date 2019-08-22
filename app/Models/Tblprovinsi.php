<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaan
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

	public function tblmahasiswa()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'prov_id');
	}

	public function tblperusahaan()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'prov_id');
	}
}
