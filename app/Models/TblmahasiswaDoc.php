<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblmahasiswaDoc
 * 
 * @property int $mhs_doc_id
 * @property int $mahasiswa_id
 * @property int $doc_id
 * @property string $doc_file
 * 
 * @property \App\Models\TbldokumenMst $tbldokumen_mst
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
 *
 * @package App\Models
 */
class TblmahasiswaDoc extends Eloquent
{
	protected $table = 'tblmahasiswa_doc';
	protected $primaryKey = 'mhs_doc_id';
	public $timestamps = false;

	protected $casts = [
		'mahasiswa_id' => 'int',
		'doc_id' => 'int'
	];

	protected $fillable = [
		'mahasiswa_id',
		'doc_id',
		'doc_file'
	];

	public function tbldokumen_mst()
	{
		return $this->belongsTo(\App\Models\TbldokumenMst::class, 'doc_id');
	}

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}
}
