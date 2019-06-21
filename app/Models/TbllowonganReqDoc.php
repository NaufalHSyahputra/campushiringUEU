<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganReqDoc
 * 
 * @property int $id
 * @property int $low_req_id
 * @property int $doc_id
 * @property int $is_approve
 * @property string $approved_by
 * @property \Carbon\Carbon $approved_date
 * @property string $approved_notes
 * 
 * @property \App\Models\TbllowonganRequest $tbllowongan_request
 * @property \App\Models\TbllowonganReqDocMst $tbllowongan_req_doc_mst
 *
 * @package App\Models
 */
class TbllowonganReqDoc extends Eloquent
{
	protected $table = 'tbllowongan_req_doc';
	public $timestamps = false;

	protected $casts = [
		'low_req_id' => 'int',
		'doc_id' => 'int',
		'is_approve' => 'int'
	];

	protected $dates = [
		'approved_date'
	];

	protected $fillable = [
		'low_req_id',
		'doc_id',
		'is_approve',
		'approved_by',
		'approved_date',
		'approved_notes'
	];

	public function tbllowongan_request()
	{
		return $this->belongsTo(\App\Models\TbllowonganRequest::class, 'low_req_id');
	}

	public function tbllowongan_req_doc_mst()
	{
		return $this->belongsTo(\App\Models\TbllowonganReqDocMst::class, 'doc_id');
	}
}
