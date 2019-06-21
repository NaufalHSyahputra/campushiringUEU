<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Jun 2019 09:02:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganDoc
 * 
 * @property int $lowongan_id
 * @property int $doc_id
 * @property int $is_mandatory
 * 
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\TbllowonganDocMst $tbllowongan_doc_mst
 *
 * @package App\Models
 */
class TbllowonganDoc extends Eloquent
{
	protected $table = 'tbllowongan_doc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'lowongan_id' => 'int',
		'doc_id' => 'int',
		'is_mandatory' => 'int'
	];

	protected $fillable = [
		'lowongan_id',
		'doc_id',
		'is_mandatory'
	];

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'lowongan_id');
	}

	public function tbllowongan_doc_mst()
	{
		return $this->belongsTo(\App\Models\TbllowonganDocMst::class, 'doc_id');
	}
}
