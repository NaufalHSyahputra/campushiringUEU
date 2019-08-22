<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganReqDoc
 * 
 * @property int $id
 * @property int $low_req_id
 * @property int $doc_id
 * @property string $file_name
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
		'doc_id' => 'int'
	];

	protected $fillable = [
		'low_req_id',
		'doc_id',
		'file_name'
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
