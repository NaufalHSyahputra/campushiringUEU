<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblmahasiswaDoc
 * 
 * @property int $mhs_req_id
 * @property int $doc_id
 * @property string $doc_file
 * @property bool $is_oke
 * @property string $notes
 * @property string $checked_by
 * @property \Carbon\Carbon $checked_date
 * 
 * @property \App\Models\TblmahasiswaDocMst $tblmahasiswa_doc_mst
 * @property \App\Models\TblmahasiswaRequest $tblmahasiswa_request
 *
 * @package App\Models
 */
class TblmahasiswaDoc extends Eloquent
{
	protected $table = 'tblmahasiswa_doc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'mhs_req_id' => 'int',
		'doc_id' => 'int',
		'is_oke' => 'bool'
	];

	protected $dates = [
		'checked_date'
	];

	protected $fillable = [
		'mhs_req_id',
		'doc_id',
		'doc_file',
		'is_oke',
		'notes',
		'checked_by',
		'checked_date'
	];

	public function tblmahasiswa_doc_mst()
	{
		return $this->belongsTo(\App\Models\TblmahasiswaDocMst::class, 'doc_id');
	}

	public function tblmahasiswa_request()
	{
		return $this->belongsTo(\App\Models\TblmahasiswaRequest::class, 'mhs_req_id');
	}
}
