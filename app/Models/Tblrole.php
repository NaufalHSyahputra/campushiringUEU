<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 15:32:02 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $tblmenu
 * @property \Illuminate\Database\Eloquent\Collection $tbluser_role
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

	public function tblmenu()
	{
		return $this->hasMany(\App\Models\Tblmenu::class, 'role_id');
	}

	public function tbluser_role()
	{
		return $this->hasMany(\App\Models\TbluserRole::class, 'role_id');
	}
}
