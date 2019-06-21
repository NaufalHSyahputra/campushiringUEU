<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:58:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganMhsDocMst
 *
 * @property int $doc_id
 * @property string $doc_desc
 *
 * @property \App\Models\TbllowonganMhsDoc $tbllowongan_mhs_doc
 *
 * @package App\Models
 */
class TbllowonganMhsDocMst extends Eloquent
{
	protected $table = 'tbllowongan_mhs_doc_mst';
	protected $primaryKey = 'doc_id';
	public $timestamps = false;

	protected $fillable = [
		'doc_desc'
	];

	public function tbllowongan_mhs_doc()
	{
		return $this->hasMany(\App\Models\TbllowonganMhsDoc::class, 'doc_id');
	}
}
