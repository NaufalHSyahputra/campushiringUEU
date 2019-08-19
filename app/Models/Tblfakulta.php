<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Aug 2019 05:29:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblfakulta
 * 
 * @property int $fakultas_id
 * @property string $fakultas_name
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbljurusans
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $tblskills
 *
 * @package App\Models
 */
class Tblfakulta extends Eloquent
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

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'fakultas_id');
	}

	public function tblmahasiswas()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'fakultas_id');
	}

	public function tblskills()
	{
		return $this->hasMany(\App\Models\Tblskill::class, 'fakultas_id');
	}
}
