<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:01 +0000.
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
 * @property \Carbon\Carbon $approved_date
 * @property string $approved_by
 * @property int $duration
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Tblperusahaan $tblperusahaan
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_mhs
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_request
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
		'expired_date',
		'approved_date'
	];

	protected $fillable = [
		'perusahaan_id',
		'title',
		'deskripsi',
		'is_active',
		'active_date',
		'expired_date',
		'is_approved',
		'approved_date',
		'approved_by',
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
		return $this->hasMany(\App\Models\TbllowonganMhs::class, 'lowongan_id');
	}

	public function tbllowongan_request()
	{
		return $this->hasMany(\App\Models\TbllowonganRequest::class, 'lowongan_id');
    }
    
    public function scopeLowonganActive($query)
    {
        return $query->where('is_approved', 1)->where('expired_date', '>', Carbon::now())->where('is_active', 1);
    }
}
