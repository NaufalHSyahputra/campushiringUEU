<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblkota
 *
 * @property string $city_id
 * @property string $prov_id
 * @property string $city_name
 *
 * @property \App\Models\Tblprovinsi $tblprovinsi
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaans
 *
 * @package App\Models
 */
class Tblkota extends Eloquent
{
	protected $primaryKey = 'city_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'prov_id',
		'city_name'
	];

	public function tblprovinsi()
	{
		return $this->belongsTo(\App\Models\Tblprovinsi::class, 'prov_id');
	}

	public function tblmahasiswa()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'city_id');
	}

	public function tblperusahaan()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'city_id');
	}
}
