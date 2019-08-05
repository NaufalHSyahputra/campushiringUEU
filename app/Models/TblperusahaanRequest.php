<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblperusahaanRequest
 * 
 * @property int $prs_req_id
 * @property \Carbon\Carbon $req_date
 * @property int $perusahaan_id
 * @property int $is_approved
 * @property string $approved_by
 * @property \Carbon\Carbon $approved_date
 * @property string $notes
 * 
 * @property \App\Models\Tblperusahaan $tblperusahaan
 *
 * @package App\Models
 */
class TblperusahaanRequest extends Eloquent
{
	protected $table = 'tblperusahaan_request';
	protected $primaryKey = 'prs_req_id';
	public $timestamps = false;

	protected $casts = [
		'perusahaan_id' => 'int',
		'is_approved' => 'int'
	];

	protected $dates = [
		'req_date',
		'approved_date'
	];

	protected $fillable = [
		'req_date',
		'perusahaan_id',
		'is_approved',
		'approved_by',
		'approved_date',
		'notes'
	];

	public function tblperusahaan()
	{
		return $this->belongsTo(\App\Models\Tblperusahaan::class, 'perusahaan_id');
	}
}
