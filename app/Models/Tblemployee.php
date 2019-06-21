<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Jun 2019 12:53:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblemployee
 * 
 * @property int $employee_id
 * @property string $name
 * @property string $alamat
 * @property string $phone
 * @property string $email
 * @property int $user_id
 * 
 * @property \App\Models\Tbluser $tbluser
 *
 * @package App\Models
 */
class Tblemployee extends Eloquent
{
	protected $table = 'tblemployee';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'alamat',
		'phone',
		'email',
		'user_id'
	];

	public function tbluser()
	{
		return $this->belongsTo(\App\Models\Tbluser::class, 'user_id');
	}
}
