<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 03 Jul 2019 16:57:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblrole
 * 
 * @property int $role_id
 * @property string $role_desc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tblmenus
 * @property \Illuminate\Database\Eloquent\Collection $tbluser_roles
 *
 * @package App\Models
 */
class Tblrole extends Eloquent
{
	protected $table = 'tblrole';
	protected $primaryKey = 'role_id';

	protected $fillable = [
		'role_desc'
	];

	public function tblmenus()
	{
		return $this->hasMany(\App\Models\Tblmenu::class, 'role_id');
	}

	public function tbluser_roles()
	{
		return $this->hasMany(\App\Models\TbluserRole::class, 'role_id');
	}
}
