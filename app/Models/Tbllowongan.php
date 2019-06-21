<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tbllowongan
 *
 * @property int $lowongan_id
 * @property int $perusahaan_id
 * @property \Carbon\Carbon $lowongan_date
 * @property \Carbon\Carbon $lowongan_expired
 * @property string $lowongan_durasi
 * @property string $lowongan_desc
 * @property int $is_active
 * @property int $is_approved
 * @property bool $is_salary_nego
 * @property int $salary_min
 * @property int $salary_max
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tblperusahaan $tblperusahaan
 * @property \App\Models\TbllowonganLevel $tbllowongan_level
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_mhs
 * @property \App\Models\TbllowonganMhsDoc $tbllowongan_mhs_doc
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_req_prints
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_requests
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_skills
 *
 * @package App\Models
 */
class Tbllowongan extends Eloquent
{
	protected $table = 'tbllowongan';
	protected $primaryKey = 'lowongan_id';

	protected $casts = [
		'perusahaan_id' => 'int',
		'is_active' => 'int',
		'is_approved' => 'int',
		'is_salary_nego' => 'bool',
		'salary_min' => 'int',
		'salary_max' => 'int'
	];

	protected $dates = [
		'lowongan_date',
		'lowongan_expired'
	];

	protected $fillable = [
		'perusahaan_id',
		'lowongan_date',
		'lowongan_expired',
		'lowongan_durasi',
		'lowongan_desc',
		'is_active',
		'is_approved',
		'is_salary_nego',
		'salary_min',
		'salary_max'
	];

	public function tblperusahaan()
	{
		return $this->belongsTo(\App\Models\Tblperusahaan::class, 'perusahaan_id');
	}

	public function tbllowongan_level()
	{
		return $this->hasOne(\App\Models\TbllowonganLevel::class, 'lowongan_id');
	}

	public function tbllowongan_mhs()
	{
		return $this->hasMany(\App\Models\TbllowonganMh::class, 'lowongan_id');
	}

	public function tbllowongan_mhs_doc()
	{
		return $this->hasOne(\App\Models\TbllowonganMhsDoc::class, 'low_mhs_id');
	}

	public function tbllowongan_req_print()
	{
		return $this->hasMany(\App\Models\TbllowonganReqPrint::class, 'lowongan_id');
	}

	public function tbllowongan_request()
	{
		return $this->hasMany(\App\Models\TbllowonganRequest::class, 'lowongan_id');
	}

	public function tbllowongan_skill()
	{
		return $this->hasMany(\App\Models\TbllowonganSkill::class, 'lowongan_id');
	}
}
