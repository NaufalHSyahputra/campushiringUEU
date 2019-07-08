<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganTypeMst
 * 
 * @property int $low_type_id
 * @property string $low_type_desc
 * 
 * @property \App\Models\TbllowonganDetil $tbllowongan_detil
 *
 * @package App\Models
 */
class TbllowonganTypeMst extends Eloquent
{
	protected $table = 'tbllowongan_type_mst';
	protected $primaryKey = 'low_type_id';
	public $timestamps = false;

	protected $fillable = [
		'low_type_desc'
	];

	public function tbllowongan_detil()
	{
		return $this->hasOne(\App\Models\TbllowonganDetil::class, 'low_type_id');
	}
}
