<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:59:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganMhsDoc
 * 
 * @property int $low_mhs_id
 * @property int $mahasiswa_id
 * @property int $doc_id
 * @property string $doc_file
 * 
 * @property \App\Models\TbllowonganMhsDocMst $tbllowongan_mhs_doc_mst
 * @property \App\Models\Tbllowongan $tbllowongan
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
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
		'doc_id' => 'int'
	];

	protected $fillable = [
		'low_mhs_id',
		'mahasiswa_id',
		'doc_id',
		'doc_file'
	];

	public function tbllowongan_mhs_doc_mst()
	{
		return $this->belongsTo(\App\Models\TbllowonganMhsDocMst::class, 'doc_id');
	}

	public function tbllowongan()
	{
		return $this->belongsTo(\App\Models\Tbllowongan::class, 'low_mhs_id');
	}

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}
}
