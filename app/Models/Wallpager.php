<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallpager
 *
 * @property int $id
 * @property string $large_image_url
 * @property string $image_id
 * @property string $tag
 * @property array $data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereLargeImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallpager whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Wallpager extends Model
{
	protected $table = 'wallpager';

	protected $casts = [
		'data' => 'json'
	];

	protected $fillable = [
		'large_image_url',
		'image_id',
		'tag',
		'data'
	];
}
