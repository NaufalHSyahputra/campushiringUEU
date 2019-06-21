<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Jun 2019 09:02:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblfakultas
 *
 * @property int $fakultas_id
 * @property string $fakultas_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $tbljurusans
 *
 * @package App\Models
 */
class Tblfakultas extends Eloquent
{
	protected $primaryKey = 'fakultas_id';

	protected $fillable = [
		'fakultas_name'
	];

	public function tbljurusan()
	{
		return $this->hasOne(\App\Models\Tbljurusan::class, 'fakultas_id');
	}
}
