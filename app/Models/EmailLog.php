<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailLog
 *
 * @property int $id
 * @property int|null $email_id
 * @property int|null $status
 * @property array|null $result
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailLog extends Model
{
	protected $table = 'email_log';

	protected $casts = [
		'email_id' => 'int',
		'status' => 'int',
		'result' => 'json'
	];

	protected $fillable = [
		'email_id',
		'status',
		'result'
	];
}
