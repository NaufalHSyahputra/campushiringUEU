<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 20:09:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganRequest
 * 
 * @property int $low_req_id
 * @property int $lowongan_id
 * @property int $req_type_id
 * @property int $is_approved
 * @property \Carbon\Carbon $approved_date
 * @property string $approved_by
 * @property string $notes
 * 
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\TbllowonganReqType $tbllowongan_req_type
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_req_docs
 *
 * @package App\Models
 */
class TbllowonganRequest extends Eloquent
{
	protected $table = 'tbllowongan_request';
	protected $primaryKey = 'low_req_id';
	public $timestamps = false;

	protected $casts = [
		'lowongan_id' => 'int',
		'req_type_id' => 'int',
		'is_approved' => 'int'
	];

	protected $dates = [
		'approved_date'
	];

	protected $fillable = [
		'lowongan_id',
		'req_type_id',
		'is_approved',
		'approved_date',
		'approved_by',
		'notes'
	];

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}

	public function tbllowongan_req_type()
	{
		return $this->belongsTo(\App\Models\TbllowonganReqType::class, 'req_type_id');
	}

	public function tbllowongan_req_docs()
	{
		return $this->hasMany(\App\Models\TbllowonganReqDoc::class, 'low_req_id');
	}
}
