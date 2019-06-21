<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganLevel
 * 
 * @property int $level_id
 * @property int $lowongan_id
 * 
 * @property \App\Models\TbllowonganLevelMst $tbllowongan_level_mst
 * @property \App\Models\Tbllowongan $tbllowongan
 *
 * @package App\Models
 */
class TbllowonganLevel extends Eloquent
{
	protected $table = 'tbllowongan_level';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'level_id' => 'int',
		'lowongan_id' => 'int'
	];

	protected $fillable = [
		'level_id',
		'lowongan_id'
	];

	public function tbllowongan_level_mst()
	{
		return $this->belongsTo(\App\Models\TbllowonganLevelMst::class, 'level_id');
	}

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}
}
