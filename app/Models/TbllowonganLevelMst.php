<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganLevelMst
 * 
 * @property int $level_id
 * @property string $level_desc
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
}
