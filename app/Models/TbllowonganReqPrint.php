<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganReqPrint
 * 
 * @property int $low_req_pr_id
 * @property int $lowongan_id
 * @property int $is_accepted
 * @property string $accepted_by
 * @property \Carbon\Carbon $accepted_date
 * @property int $status_id
 * 
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\TbllowonganPrintStatusMst $tbllowongan_print_status_mst
 *
 * @package App\Models
 */
class TbllowonganReqPrint extends Eloquent
{
	protected $table = 'tbllowongan_req_print';
	protected $primaryKey = 'low_req_pr_id';
	public $timestamps = false;

	protected $casts = [
		'lowongan_id' => 'int',
		'is_accepted' => 'int',
		'status_id' => 'int'
	];

	protected $dates = [
		'accepted_date'
	];

	protected $fillable = [
		'lowongan_id',
		'is_accepted',
		'accepted_by',
		'accepted_date',
		'status_id'
	];

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}

	public function tbllowongan_print_status_mst()
	{
		return $this->belongsTo(\App\Models\TbllowonganPrintStatusMst::class, 'status_id');
	}
}
