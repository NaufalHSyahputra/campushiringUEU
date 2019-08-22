<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
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
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
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

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'skill_id');
	}
}
