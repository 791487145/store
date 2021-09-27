<?php

/**
 * Created by Reliese Model.
 */

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Permission\Models\Permission;

/**
 * App\Model\Permissions
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string|null $describe_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 * @property string|null $icon
 * @property string|null $url
 * @property int|null $is_menu 是否菜单1是2否
 * @property int|null $is_show 是否展示1是2否
 * @property int|null $sort 排序
 * @property-read \Kalnoy\Nestedset\Collection|Permissions[] $children
 * @property-read int|null $children_count
 * @property-read Permissions $parent
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|\App\Model\User[] $users
 * @property-read int|null $users_count
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions d()
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permissions newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permissions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Permissions query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereDescribeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereIsMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereUrl($value)
 * @mixin \Eloquent
 */
class Permissions extends Permission
{
	protected $table = 'permissions';

    use NodeTrait;

    //is_menu
    const MENU_YES = 1;

    //is_show
    const SHOW_YES = 1;

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

}
