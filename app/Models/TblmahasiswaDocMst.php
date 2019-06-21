<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblmahasiswaDocMst
 * 
 * @property int $doc_id
 * @property string $doc_desc
 * @property int $is_mandatory
 * 
 * @property \App\Models\TblmahasiswaDoc $tblmahasiswa_doc
 *
 * @package App\Models
 */
class TblmahasiswaDocMst extends Eloquent
{
	protected $table = 'tblmahasiswa_doc_mst';
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
		return $this->hasOne(\App\Models\TblmahasiswaDoc::class, 'doc_id');
	}
}
