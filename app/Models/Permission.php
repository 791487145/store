<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string|null $describe_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 * @property string|null $icon
 * @property string|null $url
 * @property int|null $is_menu
 * @property int|null $is_show
 * @property int|null $sort
 * 
 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permissions';

	protected $casts = [
		'_lft' => 'int',
		'_rgt' => 'int',
		'parent_id' => 'int',
		'is_menu' => 'int',
		'is_show' => 'int',
		'sort' => 'int'
	];

	protected $fillable = [
		'name',
		'guard_name',
		'describe_name',
		'_lft',
		'_rgt',
		'parent_id',
		'icon',
		'url',
		'is_menu',
		'is_show',
		'sort'
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
