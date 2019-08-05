<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tbljurusan
 *
 * @property int $jurusan_id
 * @property int $fakultas_id
 * @property string $jurusan_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\tblfakultas $tblfakultas
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 *
 * @package App\Models
 */
class Tbljurusan extends Eloquent
{
	protected $table = 'tbljurusan';
	protected $primaryKey = 'jurusan_id';

	protected $casts = [
		'fakultas_id' => 'int'
	];

	protected $fillable = [
		'fakultas_id',
		'jurusan_name'
	];

	public function tblfakultas()
	{
		return $this->belongsTo(\App\Models\tblfakultas::class, 'fakultas_id');
	}

	public function tblmahasiswa()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'jurusan_id');
	}
}
