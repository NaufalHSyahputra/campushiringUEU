<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Jun 2019 18:18:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganDetil
 *
 * @property int $lowongan_id
 * @property string $kota_id
 * @property int $low_type_id
 * @property int $salary_min
 * @property int $salary_max
 * @property int $is_salary_nego
 *
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\Tblkotum $tblkota
 * @property \App\Models\TbllowonganTypeMst $tbllowongan_type_mst
 *
 * @package App\Models
 */
class TbllowonganDetil extends Eloquent
{
	protected $table = 'tbllowongan_detil';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'lowongan_id' => 'int',
		'low_type_id' => 'int',
		'salary_min' => 'int',
		'salary_max' => 'int',
		'is_salary_nego' => 'int'
	];

	protected $fillable = [
		'lowongan_id',
		'kota_id',
		'low_type_id',
		'salary_min',
		'salary_max',
		'is_salary_nego'
	];

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}

	public function tblkota()
	{
		return $this->belongsTo(\App\Models\Tblkota::class, 'kota_id');
	}

	public function tbllowongan_type_mst()
	{
		return $this->belongsTo(\App\Models\TbllowonganTypeMst::class, 'low_type_id');
	}
}
