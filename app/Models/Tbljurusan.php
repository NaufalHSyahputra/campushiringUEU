<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:36 +0000.
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
 * @property \App\Models\Tblfakulta $tblfakulta
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

	public function tblfakulta()
	{
		return $this->belongsTo(\App\Models\Tblfakulta::class, 'fakultas_id');
	}

	public function tblmahasiswas()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'jurusan_id');
	}
}
