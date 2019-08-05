<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class tblfakultas
 *
 * @property int $fakultas_id
 * @property string $fakultas_name
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $tbljurusans
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
 * @property \Illuminate\Database\Eloquent\Collection $tblskills
 *
 * @package App\Models
 */
class Tblfakultas extends Eloquent
{
    protected $primaryKey = 'fakultas_id';
    protected $table = 'tblfakultas';

	protected $fillable = [
		'fakultas_name',
		'icon'
	];

	public function tbljurusan()
	{
		return $this->hasMany(\App\Models\Tbljurusan::class, 'fakultas_id');
	}

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'fakultas_id');
	}

	public function tblskill()
	{
		return $this->hasMany(\App\Models\Tblskill::class, 'fakultas_id');
	}
}
