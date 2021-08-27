<?php

/**
 * Created by Reliese Model.
 */

namespace App\Model;

use Carbon\Carbon;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;



/**
 * App\Model\Menu
 *
 * @property int $id
 * @property string $name 菜单名
 * @property string|null $icon icon
 * @property int|null $sort 排序
 * @property string|null $url 链接
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 * @property-read \Kalnoy\Nestedset\Collection|Menu[] $children
 * @property-read int|null $children_count
 * @property-read Menu $parent
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Menu d()
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUrl($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
	protected $table = 'menu';

    use NodeTrait;

    protected $casts = [
        'sort' => 'int',
        '_lft' => 'int',
        '_rgt' => 'int',
        'parent_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'icon',
        'sort',
        '_lft',
        '_rgt',
        'parent_id',
        'url'
    ];



}
