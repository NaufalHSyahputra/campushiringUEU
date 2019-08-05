<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tbluser
 *
 * @property int $user_id
 * @property string $lgname
 * @property string $password
 * @property string $email
 * @property string $remember_token
 * @property int $is_logged_on
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $email_verified_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $tblemployees
 * @property \Illuminate\Database\Eloquent\Collection $tblmahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $tblperusahaans
 * @property \Illuminate\Database\Eloquent\Collection $tbluser_roles
 *
 * @package App\Models
 */
class Tbluser extends Eloquent
{
	protected $table = 'tbluser';
	protected $primaryKey = 'user_id';

	protected $casts = [
		'is_logged_on' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'lgname',
		'password',
		'email',
		'remember_token',
		'is_logged_on',
		'email_verified_at'
	];

	public function tblemployee()
	{
		return $this->hasMany(\App\Models\Tblemployee::class, 'user_id');
	}

	public function tblmahasiswa()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'user_id');
	}

	public function tblperusahaan()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'user_id');
	}

	public function tbluser_role()
	{
		return $this->hasMany(\App\Models\TbluserRole::class, 'user_id');
	}
}
