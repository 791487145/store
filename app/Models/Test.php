<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 * 
 * @property int $id
 * @property Carbon|null $time
 * @property int|null $vir_time
 * @property float|null $score
 * @property float|null $score_math
 * @property float|null $sum
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Test extends Model
{
	protected $table = 'test';

	protected $casts = [
		'vir_time' => 'int',
		'score' => 'float',
		'score_math' => 'float',
		'sum' => 'float',
		'user_id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'time',
		'vir_time',
		'score',
		'score_math',
		'sum',
		'user_id'
	];
}
