<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblmahasiswaDetail
 * 
 * @property int $mahasiswa_id
 * @property string $nim
 * @property string $nik
 * @property string $nama
 * @property string $tahun_ajaran
 * @property string $nohp
 * @property string $email
 * @property string $gender
 * @property int $is_lulus
 * @property string $tahun_lulus
 * @property string $foto
 * 
 * @property \App\Models\Tblmahasiswa $tblmahasiswa
 *
 * @package App\Models
 */
class TblmahasiswaDetail extends Eloquent
{
	protected $table = 'tblmahasiswa_detail';
	protected $primaryKey = 'mahasiswa_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'mahasiswa_id' => 'int',
		'is_lulus' => 'int'
	];

	protected $fillable = [
		'nim',
		'nik',
		'nama',
		'tahun_ajaran',
		'nohp',
		'email',
		'gender',
		'is_lulus',
		'tahun_lulus',
		'foto'
	];

	public function tblmahasiswa()
	{
		return $this->belongsTo(\App\Models\Tblmahasiswa::class, 'mahasiswa_id');
	}
}
