<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblperusahaanDetail
 * 
 * @property int $perusahaan_id
 * @property string $alamat
 * @property string $phone_number
 * @property string $deskripsi
 * @property string $logo_pic
 * @property string $web
 * @property string $pic_name
 * @property string $pic_phone
 * @property string $pic_email
 * @property string $pic_title
 * 
 * @property \App\Models\Tblperusahaan $tblperusahaan
 *
 * @package App\Models
 */
class TblperusahaanDetail extends Eloquent
{
	protected $table = 'tblperusahaan_detail';
	protected $primaryKey = 'perusahaan_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'perusahaan_id' => 'int'
	];

	protected $fillable = [
		'alamat',
		'phone_number',
		'deskripsi',
		'logo_pic',
		'web',
		'pic_name',
		'pic_phone',
		'pic_email',
        'pic_title',
        'perusahaan_id'
	];

	public function tblperusahaan()
	{
		return $this->belongsTo(\App\Models\Tblperusahaan::class, 'perusahaan_id');
	}
}
