<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property int|null $sort
 * @property string|null $url
 * @property int $is_menu
 * @property int|null $is_show
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 *
 * @package App\Models
 */
class Menu extends Model
{
	protected $table = 'menu';

	protected $casts = [
		'sort' => 'int',
		'is_menu' => 'int',
		'is_show' => 'int',
		'_lft' => 'int',
		'_rgt' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'icon',
		'sort',
		'url',
		'is_menu',
		'is_show',
		'_lft',
		'_rgt',
		'parent_id'
	];
}
