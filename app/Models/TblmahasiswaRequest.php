<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswa_docs
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

	public function tblmahasiswa_docs()
	{
		return $this->hasMany(\App\Models\TblmahasiswaDoc::class, 'mhs_req_id');
	}
}
