<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemoEmail
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $title
 * @property string|null $describe
 * @property string|null $content
 * @property int|null $send_status
 * @property int|null $time_type
 * @property int|null $week_time
 * @property string|null $send_time
 * @property string|null $plan_send_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail wherePlanSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereSendStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereTimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoEmail whereWeekTime($value)
 * @mixin \Eloquent
 */
class MemoEmail extends Model
{
	protected $table = 'memo_email';

	protected $casts = [
		'admin_id' => 'int',
		'send_status' => 'int',
		'time_type' => 'int',
		'week_time' => 'int'
	];

	protected $fillable = [
		'admin_id',
		'title',
		'describe',
		'content',
		'send_status',
		'time_type',
		'week_time',
		'send_time',
		'plan_send_time'
	];
}
