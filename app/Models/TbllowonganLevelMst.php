<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganLevelMst
 * 
 * @property int $level_id
 * @property string $level_desc
 * 
 * @property \App\Models\TbllowonganDetil $tbllowongan_detil
 *
 * @package App\Models
 */
class TbllowonganLevelMst extends Eloquent
{
	protected $table = 'tbllowongan_level_mst';
	protected $primaryKey = 'level_id';
	public $timestamps = false;

	protected $fillable = [
		'level_desc'
	];

	public function tbllowongan_detil()
	{
		return $this->hasOne(\App\Models\TbllowonganDetil::class, 'level_id');
	}
}
