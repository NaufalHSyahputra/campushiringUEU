<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganSkill
 * 
 * @property int $id
 * @property int $skill_id
 * @property int $lowongan_id
 * 
 * @property \App\Models\Tblskill $tblskill
 * @property \App\Models\Tbllowongan $tbllowongan
 *
 * @package App\Models
 */
class TbllowonganSkill extends Eloquent
{
	protected $table = 'tbllowongan_skill';
	public $timestamps = false;

	protected $casts = [
		'skill_id' => 'int',
		'lowongan_id' => 'int'
	];

	protected $fillable = [
		'skill_id',
		'lowongan_id'
	];

	public function tblskill()
	{
		return $this->belongsTo(\App\Models\Tblskill::class, 'skill_id');
	}

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}
}
