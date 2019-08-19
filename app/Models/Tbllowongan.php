<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:04 +0000.
 */

namespace App\Models;

use Carbon\Carbon;
use EloquentFilter\Filterable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tbllowongan
 *
 * @property int $lowongan_id
 * @property int $perusahaan_id
 * @property string $title
 * @property string $deskripsi
 * @property bool $is_active
 * @property \Carbon\Carbon $active_date
 * @property \Carbon\Carbon $expired_date
 * @property bool $is_approved
 * @property bool $duration
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tblperusahaan $tblperusahaan
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
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
		'duration' => 'int'
	];

	protected $dates = [
		'active_date',
		'expired_date'
	];

	protected $fillable = [
		'perusahaan_id',
		'title',
		'deskripsi',
		'is_active',
		'active_date',
		'expired_date',
		'is_approved',
		'duration'
	];

	public function tblperusahaan()
	{
		return $this->belongsTo(\App\Models\Tblperusahaan::class, 'perusahaan_id');
	}

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'lowongan_id');
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

    public function scopeLowonganActive($query)
    {
        return $query->where('is_approved', 1)->where('expired_date', '>', Carbon::now())->where('is_active', 1);
    }
}
