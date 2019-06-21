<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblmahasiswaRequest
 * 
 * @property int $mhs_req_id
 * @property \Carbon\Carbon $req_date
 * @property int $mahasiswa_id
 * @property int $is_approved
 * @property string $approved_by
 * @property \Carbon\Carbon $approved_date
 * @property string $notes
 * 
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
 * @property \App\Models\TblmahasiswaDoc $tblmahasiswa_doc
 *
 * @package App\Models
 */
class TblmahasiswaRequest extends Eloquent
{
	protected $table = 'tblmahasiswa_request';
	protected $primaryKey = 'mhs_req_id';
	public $timestamps = false;

	protected $casts = [
		'mahasiswa_id' => 'int',
		'is_approved' => 'int'
	];

	protected $dates = [
		'req_date',
		'approved_date'
	];

	protected $fillable = [
		'req_date',
		'mahasiswa_id',
		'is_approved',
		'approved_by',
		'approved_date',
		'notes'
	];

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_doc()
	{
		return $this->hasOne(\App\Models\TblmahasiswaDoc::class, 'mhs_req_id');
	}
}
