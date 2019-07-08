<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 04 Jul 2019 02:15:02 +0000.
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
 * @property \App\Models\Tblfakultas $tblfakultas
 * @property \App\Models\TbllowonganDetil $tbllowongan_detil
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
		return $this->belongsTo(\App\Models\Tblfakultas::class, 'fakultas_id');
	}

	public function tbllowongan_detil()
	{
		return $this->hasOne(\App\Models\TbllowonganDetil::class, 'skill_id');
	}

	public function tblmahasiswa_skills()
	{
		return $this->hasMany(\App\Models\TblmahasiswaSkill::class, 'skill_id');
	}
}
