<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbluserRole
 * 
 * @property int $id
 * @property int $role_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Tblrole $tblrole
 * @property \App\Models\Tbluser $tbluser
 *
 * @package App\Models
 */
class TbluserRole extends Eloquent
{
	protected $table = 'tbluser_role';

	protected $casts = [
		'role_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'role_id',
		'user_id'
	];

	public function tblrole()
	{
		return $this->belongsTo(\App\Models\Tblrole::class, 'role_id');
	}

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}
}
