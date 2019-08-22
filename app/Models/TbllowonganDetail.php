<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:01 +0000.
 */

namespace App\Models;

use EloquentFilter\Filterable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganDetail
 *
 * @property int $lowongan_id
 * @property string $kota_id
 * @property int $low_type_id
 * @property int $fakultas_id
 * @property int $skill_id
 * @property int $salary_min
 * @property int $salary_max
 * @property int $is_salary_nego
 *
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\Tblkota $tblkota
 * @property \App\Models\TbllowonganTypeMst $tbllowongan_type_mst
 * @property \App\Models\Tblskill $tblskill
 * @property \App\Models\Tblfakultas $tblfakultas
 *
 * @package App\Models
 */
class TbllowonganDetail extends Eloquent
{
    use Filterable;
    
	protected $table = 'tbllowongan_detail';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'lowongan_id' => 'int',
		'low_type_id' => 'int',
		'fakultas_id' => 'int',
		'skill_id' => 'int',
		'salary_min' => 'int',
		'salary_max' => 'int',
		'is_salary_nego' => 'int'
	];

	protected $fillable = [
		'lowongan_id',
		'kota_id',
		'low_type_id',
		'fakultas_id',
		'skill_id',
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

	public function tblskill()
	{
		return $this->belongsTo(\App\Models\Tblskill::class, 'skill_id');
	}

	public function tblfakultas()
	{
		return $this->belongsTo(\App\Models\Tblfakultas::class, 'fakultas_id');
	}
}
