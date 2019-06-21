<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganLevelMst
 * 
 * @property int $level_id
 * @property string $level_desc
 * 
 * @property \App\Models\TbllowonganLevel $tbllowongan_level
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

	public function tbllowongan_level()
	{
		return $this->hasOne(\App\Models\TbllowonganLevel::class, 'level_id');
	}
}
