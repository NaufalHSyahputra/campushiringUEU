<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbldokumenMst
 * 
 * @property int $doc_id
 * @property string $doc_desc
 * @property bool $is_multiple
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
		'is_multiple' => 'bool'
	];

	protected $fillable = [
		'doc_desc',
		'is_multiple'
	];

	public function tblmahasiswa_docs()
	{
		return $this->hasMany(\App\Models\TblmahasiswaDoc::class, 'doc_id');
	}
}
