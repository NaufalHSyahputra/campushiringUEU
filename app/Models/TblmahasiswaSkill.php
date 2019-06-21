<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblmahasiswaSkill
 * 
 * @property int $id
 * @property int $skill_id
 * @property int $mahasiswa_id
 * 
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
 * @property \App\Models\Tblskill $tblskill
 *
 * @package App\Models
 */
class TblmahasiswaSkill extends Eloquent
{
	protected $table = 'tblmahasiswa_skill';
	public $timestamps = false;

	protected $casts = [
		'skill_id' => 'int',
		'mahasiswa_id' => 'int'
	];

	protected $fillable = [
		'skill_id',
		'mahasiswa_id'
	];

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}

	public function tblskill()
	{
		return $this->belongsTo(\App\Models\Tblskill::class, 'skill_id');
	}
}
