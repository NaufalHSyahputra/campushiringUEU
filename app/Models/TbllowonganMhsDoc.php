<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganMhsDoc
 * 
 * @property int $low_mhs_id
 * @property int $mahasiswa_id
 * @property int $mhs_doc_id
 * 
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
 * @property \App\Models\TblmahasiswaDoc $tblmahasiswa_doc
 *
 * @package App\Models
 */
class TbllowonganMhsDoc extends Eloquent
{
	protected $table = 'tbllowongan_mhs_doc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'low_mhs_id' => 'int',
		'mahasiswa_id' => 'int',
		'mhs_doc_id' => 'int'
	];

	protected $fillable = [
		'low_mhs_id',
		'mahasiswa_id',
		'mhs_doc_id'
	];

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'low_mhs_id');
	}

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}

	public function tblmahasiswa_doc()
	{
		return $this->belongsTo(\App\Models\TblmahasiswaDoc::class, 'mhs_doc_id');
	}
}
