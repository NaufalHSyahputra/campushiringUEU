<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganMhs
 *
 * @property int $low_mhs_id
 * @property int $mahasiswa_id
 * @property int $lowongan_id
 * @property \Carbon\Carbon $apply_dates
 * @property int $is_respond
 * @property string $respond_notes
 * @property \Carbon\Carbon $respond_date
 * @property string $mhs_desc
 * @property string $mhs_magang_doc
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
		'mhs_desc',
		'mhs_magang_doc'
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
