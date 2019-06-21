<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Jun 2019 09:02:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganMh
 *
 * @property int $low_mhs_id
 * @property int $mahasiswa_id
 * @property int $lowongan_id
 * @property \Carbon\Carbon $dates
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
		'dates',
		'respond_date'
	];

	protected $fillable = [
		'mahasiswa_id',
		'lowongan_id',
		'dates',
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
