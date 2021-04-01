<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MemoWebsite
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $url
 * @property string|null $describe
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoWebsite whereUrl($value)
 * @mixin \Eloquent
 */
class MemoWebsite extends Model
{
	protected $table = 'memo_website';
	public $timestamps = false;

	protected $fillable = [
		'title',
		'url',
		'describe'
	];
}
