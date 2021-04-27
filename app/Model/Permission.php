<?php

/**
 * Created by Reliese Model.
 */

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = 'permissions';

	protected $casts = [
		'menu_id' => 'int',
		'menu_f_id' => 'int'
	];

	protected $fillable = [
		'name',
		'guard_name',
		'describe_name',
		'menu_id',
		'menu_f_id'
	];

	public function model_has_permissions()
	{
		return $this->hasMany(ModelHasPermission::class);
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_has_permissions');
	}
}
