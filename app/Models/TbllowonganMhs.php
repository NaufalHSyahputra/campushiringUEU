<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganMh
 *
 * @property int $low_mhs_id
 * @property int $mahasiswa_id
 * @property int $lowongan_id
 * @property \Carbon\Carbon $apply_dates
 * @property int $is_respond
 * @property string $respond_notes
 * @property \Carbon\Carbon $respond_date
 * @property string $mhs_desc
 *
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
 *
 * @package App\Models
 */
class TbllowonganMhs extends Eloquent
{
	protected $primaryKey = 'low_mhs_id';
	public $timestamps = false;

	protected $casts = [
		'mahasiswa_id' => 'int',
		'lowongan_id' => 'int',
		'is_respond' => 'int'
	];

	protected $dates = [
		'apply_dates',
		'respond_date'
	];

	protected $fillable = [
		'mahasiswa_id',
		'lowongan_id',
		'apply_dates',
		'is_respond',
		'respond_notes',
		'respond_date',
		'mhs_desc'
	];

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}
}
