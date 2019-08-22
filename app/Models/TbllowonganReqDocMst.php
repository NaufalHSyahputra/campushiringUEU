<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_req_doc
 *
 * @package App\Models
 */
class TbllowonganReqDocMst extends Eloquent
{
	protected $table = 'tbllowongan_req_doc_mst';
	protected $primaryKey = 'doc_id';
	public $timestamps = false;

	protected $fillable = [
		'doc_name',
	];

	public function tbllowongan_req_doc()
	{
		return $this->hasMany(\App\Models\TbllowonganReqDoc::class, 'doc_id');
	}
}
