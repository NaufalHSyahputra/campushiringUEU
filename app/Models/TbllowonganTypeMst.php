<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganTypeMst
 * 
 * @property int $low_type_id
 * @property string $low_type_desc
 * 
 * @property \App\Models\TbllowonganDetail $tbllowongan_detail
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

	public function tbllowongan_detail()
	{
		return $this->hasOne(\App\Models\TbllowonganDetail::class, 'low_type_id');
	}
}
