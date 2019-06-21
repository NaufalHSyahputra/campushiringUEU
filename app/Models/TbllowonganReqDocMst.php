<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganReqDocMst
 *
 * @property int $doc_id
 * @property string $doc_name
 * @property int $is_mandatory
 *
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_req_docs
 *
 * @package App\Models
 */
class TbllowonganReqDocMst extends Eloquent
{
	protected $table = 'tbllowongan_req_doc_mst';
	protected $primaryKey = 'doc_id';
	public $timestamps = false;

	protected $casts = [
		'is_mandatory' => 'int'
	];

	protected $fillable = [
		'doc_name',
		'is_mandatory'
	];

	public function tbllowongan_req_doc()
	{
		return $this->hasMany(\App\Models\TbllowonganReqDoc::class, 'doc_id');
	}
}
