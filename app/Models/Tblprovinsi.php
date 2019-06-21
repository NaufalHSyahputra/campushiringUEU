<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblprovinsi
 *
 * @property string $prov_id
 * @property string $prov_name
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
		'prov_name'
	];

	public function tblkota()
	{
		return $this->hasMany(\App\Models\Tblkota::class, 'prov_id');
	}

	public function tblmahasiswa()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'provinsi_id');
	}

	public function tblperusahaan()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'prov_id');
	}
}
