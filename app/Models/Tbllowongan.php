<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use EloquentFilter\Filterable;

/**
 * Class Tbllowongan
 *
 * @property int $lowongan_id
 * @property int $perusahaan_id
 * @property string $title
 * @property string $deskripsi
 * @property bool $is_active
 * @property \Carbon\Carbon $active_date
 * @property bool $is_approved
 * @property bool $duration
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tblperusahaan $tblperusahaan
 * @property \App\Models\TbllowonganDetil $tbllowongan_detil
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
    use Filterable;

	protected $table = 'tbllowongan';
	protected $primaryKey = 'lowongan_id';

	protected $casts = [
		'perusahaan_id' => 'int',
		'is_active' => 'bool',
		'is_approved' => 'bool',
		'duration' => 'bool'
	];

	protected $dates = [
		'active_date'
	];

	protected $fillable = [
		'perusahaan_id',
		'title',
		'deskripsi',
		'is_active',
		'active_date',
		'is_approved',
		'duration'
	];

	public function tblperusahaan()
	{
		return $this->belongsTo(\App\Models\Tblperusahaan::class, 'perusahaan_id');
	}

	public function tbllowongan_detil()
	{
		return $this->hasOne(\App\Models\TbllowonganDetil::class, 'lowongan_id');
	}

	public function tbllowongan_mhs()
	{
		return $this->hasMany(\App\Models\TbllowonganMh::class, 'lowongan_id');
	}

	public function tbllowongan_mhs_doc()
	{
		return $this->hasOne(\App\Models\TbllowonganMhsDoc::class, 'low_mhs_id');
	}

	public function tbllowongan_req_prints()
	{
		return $this->hasMany(\App\Models\TbllowonganReqPrint::class, 'lowongan_id');
	}

	public function tbllowongan_requests()
	{
		return $this->hasMany(\App\Models\TbllowonganRequest::class, 'lowongan_id');
	}

	public function tbllowongan_skills()
	{
		return $this->hasMany(\App\Models\TbllowonganSkill::class, 'lowongan_id');
	}
}
