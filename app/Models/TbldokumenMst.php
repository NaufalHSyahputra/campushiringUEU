<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbldokumenMst
 *
 * @property int $doc_id
 * @property string $doc_desc
 * @property int $is_mandatory
 *
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_docs
 *
 * @package App\Models
 */
class TbldokumenMst extends Eloquent
{
	protected $table = 'tbldokumen_mst';
	protected $primaryKey = 'doc_id';
	public $timestamps = false;

	protected $casts = [
		'is_mandatory' => 'int'
	];

	protected $fillable = [
		'doc_desc',
		'is_mandatory'
	];

	public function tblmahasiswa_doc()
	{
		return $this->hasMany(\App\Models\TblmahasiswaDoc::class, 'doc_id');
	}
}
