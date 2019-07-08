<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganPrintStatusMst
 * 
 * @property int $status_id
 * @property string $status_name
 * @property string $warna
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_req_prints
 *
 * @package App\Models
 */
class TbllowonganPrintStatusMst extends Eloquent
{
	protected $table = 'tbllowongan_print_status_mst';
	protected $primaryKey = 'status_id';
	public $timestamps = false;

	protected $fillable = [
		'status_name',
		'warna'
	];

	public function tbllowongan_req_prints()
	{
		return $this->hasMany(\App\Models\TbllowonganReqPrint::class, 'status_id');
	}
}
