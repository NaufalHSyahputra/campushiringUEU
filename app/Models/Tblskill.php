<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblskill
 * 
 * @property int $skill_id
 * @property string $skill_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_skills
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_skills
 *
 * @package App\Models
 */
class Tblskill extends Eloquent
{
	protected $table = 'tblskill';
	protected $primaryKey = 'skill_id';

	protected $fillable = [
		'skill_name'
	];

	public function tbllowongan_skills()
	{
		return $this->hasMany(\App\Models\TbllowonganSkill::class, 'skill_id');
	}

	public function tblmahasiswa_skills()
	{
		return $this->hasMany(\App\Models\TblmahasiswaSkill::class, 'skill_id');
	}
}
