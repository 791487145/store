<?php

/**
 * Created by Reliese Model.
 */

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Email
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $title 标题
 * @property string|null $describe 描述
 * @property string|null $content 内容
 * @property int|null $send_status 发送状态1未发送2已发送
 * @property int|null $time_type 时间类型1一次2每天
 * @property int|null $week_time 每周时间
 * @property string|null $send_time 发送时间
 * @property string|null $plan_send_time 计划发送时间
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email wherePlanSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereSendStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereTimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereWeekTime($value)
 * @mixin \Eloquent
 */
class Email extends Model
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
