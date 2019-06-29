<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 16:26:37 +0000.
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
 * @property string $fullname
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
	public $incrementing = false;

	protected $casts = [
		'user_id' => 'int',
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
		'fullname',
		'is_logged_on',
		'email_verified_at'
	];

	public function tblemployees()
	{
		return $this->hasMany(\App\Models\Tblemployee::class, 'user_id');
	}

	public function tblmahasiswas()
	{
		return $this->hasMany(\App\Models\Tblmahasiswa::class, 'user_id');
	}

	public function tblperusahaans()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'user_id');
	}

	public function tbluser_roles()
	{
		return $this->hasMany(\App\Models\TbluserRole::class, 'user_id');
	}
}
