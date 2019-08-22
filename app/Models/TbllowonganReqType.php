<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 20:09:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbllowonganReqType
 * 
 * @property int $req_type_id
 * @property string $req_type_desc
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbllowongan_requests
 *
 * @package App\Models
 */
class TbllowonganReqType extends Eloquent
{
	protected $table = 'tbllowongan_req_type';
	protected $primaryKey = 'req_type_id';
	public $timestamps = false;

	protected $fillable = [
		'req_type_desc'
	];

	public function tbllowongan_requests()
	{
		return $this->hasMany(\App\Models\TbllowonganRequest::class, 'req_type_id');
	}
}
