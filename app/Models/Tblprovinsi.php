<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
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
		return $this->hasMany(\App\Models\tblkota::class, 'prov_id');
	}

	public function tblmahasiswas()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'provinsi_id');
	}

	public function tblperusahaans()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'prov_id');
	}
}
