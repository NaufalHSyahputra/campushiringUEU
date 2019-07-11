<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $table = 'tbluser';
    public $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'password',
		'email',
		'remember_token',
		'fullname',
		'is_logged_on'
    ];

    protected $casts = [
		'user_id' => 'int',
        'is_logged_on' => 'int',
        'email_verified_at' => 'datetime',
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function tblmahasiswa()
	{
		return $this->hasOne(\App\Models\Tblmahasiswa::class, 'user_id', 'user_id');
	}

	public function tblperusahaan()
	{
		return $this->hasMany(\App\Models\Tblperusahaan::class, 'user_id');
    }

    public function tblemployee()
	{
		return $this->hasMany(\App\Models\Tblemployee::class, 'user_id');
	}

	public function tbluser_roles()
	{
		return $this->hasOne(\App\Models\TbluserRole::class, 'user_id');
    }

    /*Role Checker */
    public function hasRole($roles)
	{
		$this->have_role = $this->getUserRole();
		// Check if the user is a Admin account
		if($this->have_role->tblrole->role_desc == 'Admin') {
			return true;
		}
		if(is_array($roles)){
			foreach($roles as $need_role){
				if($this->checkIfUserHasRole($need_role)) {
					return true;
				}
			}
		} else {
			return $this->checkIfUserHasRole($roles);
		}
		return false;
	}
	private function getUserRole()
	{
		return $this->tbluser_roles()->getResults();
	}
	private function checkIfUserHasRole($need_role)
	{
		return (strtolower($need_role)==strtolower($this->have_role->tblrole->role_desc)) ? true : false;
	}
}
