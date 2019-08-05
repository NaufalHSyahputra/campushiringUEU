<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblskill
 *
 * @property int $skill_id
 * @property int $fakultas_id
 * @property string $skill_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\tblfakultas $tblfakultas
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_skills
 *
 * @package App\Models
 */
class Tblskill extends Eloquent
{
	protected $table = 'tblskill';
	protected $primaryKey = 'skill_id';

	protected $casts = [
		'fakultas_id' => 'int'
	];

	protected $fillable = [
		'fakultas_id',
		'skill_name'
	];

	public function tblfakultas()
	{
		return $this->belongsTo(\App\Models\Tblfakulta::class, 'fakultas_id');
	}

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'skill_id');
	}

	public function tblmahasiswa_skill()
	{
		return $this->hasMany(\App\Models\TblmahasiswaSkill::class, 'skill_id');
	}
}
