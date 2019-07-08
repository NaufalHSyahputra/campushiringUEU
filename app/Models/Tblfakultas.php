<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 04 Jul 2019 02:14:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblfakultas
 *
 * @property int $fakultas_id
 * @property string $fakultas_name
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $tbljurusans
 * @property \App\Models\TbllowonganDetil $tbllowongan_detil
 * @property \Illuminate\Database\Eloquent\Collection $tblskills
 *
 * @package App\Models
 */
class Tblfakultas extends Eloquent
{
	protected $primaryKey = 'fakultas_id';

	protected $fillable = [
		'fakultas_name',
		'icon'
	];

	public function tbljurusans()
	{
		return $this->hasMany(\App\Models\Tbljurusan::class, 'fakultas_id');
	}

	public function tbllowongan_detil()
	{
		return $this->hasOne(\App\Models\TbllowonganDetil::class, 'fakultas_id');
	}

	public function tblskills()
	{
		return $this->hasMany(\App\Models\Tblskill::class, 'fakultas_id');
	}
}
