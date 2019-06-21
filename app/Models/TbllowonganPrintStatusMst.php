<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganPrintStatusMst
 *
 * @property int $status_id
 * @property string $status_name
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
		'status_name'
	];

	public function tbllowongan_req_print()
	{
		return $this->hasMany(\App\Models\TbllowonganReqPrint::class, 'status_id');
	}
}
