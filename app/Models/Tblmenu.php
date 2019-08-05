<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 12:30:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tblmenu
 * 
 * @property int $id
 * @property string $menu_id
 * @property string $menu_desc
 * @property string $link_to
 * @property string $is_parent_child
 * @property int $parent_id
 * @property int $parent_id2
 * @property int $role_id
 * @property int $is_visible
 * @property string $icon
 * 
 * @property \App\Models\Tblrole $tblrole
 *
 * @package App\Models
 */
class Tblmenu extends Eloquent
{
	protected $table = 'tblmenu';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'parent_id2' => 'int',
		'role_id' => 'int',
		'is_visible' => 'int'
	];

	protected $fillable = [
		'menu_id',
		'menu_desc',
		'link_to',
		'is_parent_child',
		'parent_id',
		'parent_id2',
		'role_id',
		'is_visible',
		'icon'
	];

	public function tblrole()
	{
		return $this->belongsTo(\App\Models\Tblrole::class, 'role_id');
	}
}
