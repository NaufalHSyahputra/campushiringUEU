<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Jun 2019 09:02:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganDocMst
 * 
 * @property int $doc_id
 * @property string $doc_desc
 * 
 * @property \App\Models\TbllowonganDoc $tbllowongan_doc
 *
 * @package App\Models
 */
class TbllowonganDocMst extends Eloquent
{
	protected $table = 'tbllowongan_doc_mst';
	protected $primaryKey = 'doc_id';
	public $timestamps = false;

	protected $fillable = [
		'doc_desc'
	];

	public function tbllowongan_doc()
	{
		return $this->hasOne(\App\Models\TbllowonganDoc::class, 'doc_id');
	}
}
